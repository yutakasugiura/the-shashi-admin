import { ReadFileData } from '../Domain/Utility/ReadFileData';
import { ReadEdinetCodeListService } from '../Domain/ReadEdinetCodeListService';
import { CreateJsonFile } from '../Domain/Utility/CreateJsonFile';
import ConsoleConfig from '../config/ConsoleConfig';

/**
 * Read All IPO Companies in Japan from Edinet code list
 *  - https://disclosure.edinet-fsa.go.jp/
 * 
 * 1. Read Csv File
 * ../data/EdinetcodeDlInfo.csv // Edinet既定のファイル名
 * 
 * 2. Export Json File
 * ../data/json/EdinetCodeList.json
 * 
 * Execute Command 
 *  - ts-node app/className.ts
 */
class ReadEdinetCodeList {
    constructor() {

        // Declare Import Edinet Csv File
        console.log(ConsoleConfig.reset + 'Saved File: ../edinet/EdinetcodeDlInfo.json')

        try {
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

            console.log(ConsoleConfig.green + 'Completed: Create company index data');
            console.log(ConsoleConfig.reset + 'Saved File: ../data/json/EditnetCodeList.json')

        } catch (err) {
            console.log(ConsoleConfig.red + 'There is no import Csv file');
        }
    }
}

new ReadEdinetCodeList();