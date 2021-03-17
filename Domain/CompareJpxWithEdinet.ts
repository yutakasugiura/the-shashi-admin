export class CompareJpxWithEdinet {
    /**
     * EdinetからJpx400の企業のみ取得し、JPX400の企業リストを生成
     * 
     */
    public execute(jpx400: any[]):any
    {
        // get EdinetCodeList.json
        const edinetCodeList = require('../data/json/EdinetCodeList.json');

        const result: any = [];

        jpx400.forEach(function (companyIsJpx400) {
            edinetCodeList.forEach(function (companyFromEdinet: any) {
                const stockCodeFromJpx400 = parseInt(companyIsJpx400[0]);
                if (stockCodeFromJpx400 === companyFromEdinet.stockCode) {
                    console.log(companyFromEdinet);
                    result.push(companyFromEdinet);
                }
            });
        });
        return result;
    }
}