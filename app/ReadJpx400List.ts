import { ReadFileData } from '../Domain/Utility/ReadFileData';
import { CompareJpxWithEdinet } from '../Domain/CompareJpxWithEdinet';
import { CreateJsonFile } from '../Domain/Utility/CreateJsonFile';
/**
 * execute command
 *  - %tsc app/className.ts
 *  - %node app/className.js
 */
class ReadJpx400List {
    constructor() {

        // setting of console color
        const red = '\u001b[31m';
        const cyan = '\u001b[36m';
        const yellow = '\u001b[33m';
        const green = '\u001b[32m';
        const reset = '\u001b[0m';

        /**
         * csv format
         * [stockCode: Number, companyName: String]
         */
        try {
        const filePath = './data/jpx/jpx400.csv'
        const readFileData = new ReadFileData();

        const jpx400 = readFileData.readCsv(filePath, 'UTF8');

        // Edinet Code List (json) と証券コードを突合
        const compareJpxWithEdinet = new CompareJpxWithEdinet();
        const formattedJpx400 = compareJpxWithEdinet.execute(jpx400);

        console.log(formattedJpx400);

        // 3. convert object to json
        const createJsonFile = new CreateJsonFile();
        createJsonFile.execute(formattedJpx400, 'Jpx400List');

        console.log(reset + '==========');
        console.log('Completed: Create company index data');

        } catch (err) {
            console.log(red + 'There is no company file');
        }
    }
}

new ReadJpx400List();