import { ReadFileData } from '../Domain/Utility/ReadFileData';
import { ReadEdinetCodeListService } from '../Domain/ReadEdinetCodeListService';
import { CreateJsonFile } from '../Domain/Utility/CreateJsonFile';

/**
 * Read All IPO Companies in Japan from Edinet code list
 *  - https://disclosure.edinet-fsa.go.jp/
 * 
 * Execute Command 
 *  - % ts-node app/className.ts
 */
class ReadEdinetCodeList {
    constructor() {

        // setting of console color
        const red = '\u001b[31m';
        const cyan = '\u001b[36m';
        const yellow = '\u001b[33m';
        const green = '\u001b[32m';
        const reset = '\u001b[0m';

        // try {
        // 1. read edinet code list from csv
        const filePath = './data/edinet/EdinetcodeDlInfo.csv'

        const readFileData = new ReadFileData();
        const csv = readFileData.readCsv(filePath, 'UTF-8');

        // 2. data creasing
        const readEdinetCodeListService = new ReadEdinetCodeListService();
        const data = readEdinetCodeListService.execute(csv);

        // 3. convert object to json
        const createJsonFile = new CreateJsonFile();
        createJsonFile.execute(data, 'EdinetCodeList');

        console.log(reset + '==========');
        console.log('Completed: Create company index data');

        // } catch (err) {
        //     // TODO: output to error log file
        //     console.log(red + 'There is no company Csvx file');
        // }
    }
}

new ReadEdinetCodeList();