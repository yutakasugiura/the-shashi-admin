/**
 * execute command
 *  - %tsc app/className.ts
 *  - %node app/className.js
 */
class ReadXbrl {
    constructor() {

        // setting of console color
        const red = '\u001b[31m';
        const cyan = '\u001b[36m';
        const yellow = '\u001b[33m';
        const green = '\u001b[32m';
        const reset = '\u001b[0m';

        const ParseXbrl = require('parse-xbrl');
        const filePath = '../data/xbrl/S100IX2R/XBRL/PublicDoc/jpcrp030000-asr-001_E03296-000_2020-03-31_01_2020-06-26_pre.xml'

        ParseXbrl.parseStr('<?xml version="1.0" encoding="US-ASCII"?> <xbrli:xbrlxmlns:aapl="../data/xbrl/S100IX2R/XBRL/PublicDoc/jpcrp030000-asr-001_E03296-000_2020-03-31_01_2020-06-26_pre.xml">')
            .then(function (parsedString: any) {
                console.log(parsedString);
            });




    }
}

new ReadXbrl();