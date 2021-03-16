import { ReadFileData } from '../Domain/Utility/ReadFileData';

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
        const characterCode = 'SHIFT-JIS';

        const readFileData = new ReadFileData();
        readFileData.readCsv(filePath, characterCode);


        console.log(reset + '==========');
        console.log('Completed: Create company index data');

        // } catch (err) {
        //     // TODO: output to error log file
        //     console.log(red + 'There is no company Csvx file');
        // }
    }
}

new ReadEdinetCodeList();