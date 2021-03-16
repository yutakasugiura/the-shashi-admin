import * as fs from 'fs';

/**
 * Export Json
 *  - use any because of all data to json
 * 
 */
export class CreateJsonFile {
    public execute(formattedData: object, fileName: string | number): void {
        const filePath: string = './data/output/';

        fs.writeFile(filePath + fileName + '.json', JSON.stringify(formattedData, undefined, 2), (err) => {
            if (err) throw err;
        });
    }
}