"use strict";
exports.__esModule = true;
exports.ReadFileData = void 0;
var fs = require("fs");
var iconv = require("iconv-lite");
/**
 * Common class to read file data (csv etc...)
 *
 * return @any[]
 */
var ReadFileData = /** @class */ (function () {
    function ReadFileData() {
    }
    ReadFileData.prototype.readCsv = function (targetFilePath, characterCode) {
        // set up for read csv
        var csv = fs.createReadStream(targetFilePath)
            .pipe(iconv.decodeStream(characterCode))
            .pipe(iconv.encodeStream('utf-8'))
            .pipe(process.stdout);
        console.log(csv);
        return [];
    };
    return ReadFileData;
}());
exports.ReadFileData = ReadFileData;
