import * as fs from 'fs';
import * as iconv from 'iconv-lite';

/**
 * Common class to read file data (csv etc...)
 *  
 * return @any[]
 */
export class ReadFileData {
    public readCsv(targetFilePath: string, characterCode: string): any[] {
        // set up for read csv

        const csv = fs.createReadStream(targetFilePath)
            .pipe(iconv.decodeStream(characterCode))
            .pipe(iconv.encodeStream('utf-8'))
            .pipe(process.stdout);
        console.log(csv);

        return [];

    }

}