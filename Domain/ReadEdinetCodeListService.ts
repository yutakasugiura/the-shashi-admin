export class ReadEdinetCodeListService {

    /**
     * 一般企業のみ抽出し、整形する
     * 
     * @param data 
     */
    public execute(data: any): any {
        const result: any = [];
        data.forEach(function (company: any) {
            // remove not company ex.投資組合・個人
            if (company[2] === '') {
                return;
            }

            const stockCode = company[11] / 10;

            const companyName = company[6].replace('株式会社', '').replace('　', ' ').replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s: any) {
                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            });;

            const headOffice = company[9].replace('　', ' ').replace(/[０-９]/g, function (s: any) {
                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            });;

            const isConsolidated = company[3] === '有' ? true : false;

            const isLiested = company[2] === '上場' ? true : false;

            const subMissionNumber = company[12] > 1000000000000 ? parseInt(company[12]) : 9999999999999;

            const creasingCompanyData = {
                stockCode: stockCode > 1000 ? stockCode : 9999, // 9999 means 非上場
                companyName: companyName,
                industryType: company[10],
                headOffice: headOffice,
                isLiested: isLiested,
                capital: Math.floor(parseInt(company[4]) / 100),
                capitalUnit: '億円',
                consolidated: isConsolidated,
                closingDay: company[5],
                edinetCode: company[0],
                submissionNumber: subMissionNumber > 1000000000000 ? subMissionNumber : 9999999999999,
            }

            result.push(creasingCompanyData)
        });

        result.sort(function (a: any, b: any): number {
            if (a.stockCode < b.stockCode) return -1;
            if (a.stockCode > b.stockCode) return 1;
            return 0;
        });

        return result;
    }

    private japaneseToEnglish(str: string): string {
        const replacedBlank = str.replace('　', ' ');
        return replacedBlank.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
            return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
        });
    }
}