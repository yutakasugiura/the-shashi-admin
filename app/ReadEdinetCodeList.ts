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

        try {
            // 1. read company lists for json

            console.log(reset + '==========');
            console.log('Completed: Create company index data');

        } catch(err) {
            // TODO: output to error log file
            console.log(red + 'There is no company xlsx file');
        }
    }
}

new ReadEdinetCodeList();