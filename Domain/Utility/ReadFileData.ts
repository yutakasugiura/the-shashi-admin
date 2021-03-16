import * as fs from 'fs';
import * as parse from 'csv-parse';
import * as csv from 'csv';
import * as iconv from 'iconv-lite';
import * as csvParse from 'csv-parse/lib/sync';

/**
 * Common class to read file data (csv etc...)
 *  
 * return @any[]
 */
export class ReadFileData {
    public readCsv(targetFilePath: string, characterCode: string): any {

        const csvSync = require('csv-parse/lib/sync');
        const data = fs.readFileSync(targetFilePath, { encoding: characterCode });

        return csvSync(data);

    }
}