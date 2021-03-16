/**
 * Create Company Lists for Index Page
 *  - %tsc app/className.ts
 *  - %node app/className.js
 */
class CreateCompanyIndex {
    constructor() {

        // setting of console color
        const red = '\u001b[31m';
        const cyan = '\u001b[36m';
        const yellow = '\u001b[33m';
        const green = '\u001b[32m';
        const reset = '\u001b[0m';

        try {
            // 1. test

            console.log(reset + '==========');
            console.log('Completed: Create company index data');

        } catch(err) {
            // TODO: output to error log file
            console.log(red + 'There is no company xlsx file');
        }
    }
}

new CreateCompanyIndex();