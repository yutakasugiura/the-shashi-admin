"use strict";
exports.__esModule = true;
exports.ReadFileData = void 0;
var fs = require("fs");
/**
 * Common class to read file data (csv etc...)
 *
 * return @any[]
 */
var ReadFileData = /** @class */ (function () {
    function ReadFileData() {
    }
    ReadFileData.prototype.readCsv = function (targetFilePath, characterCode) {
        var csvSync = require('csv-parse/lib/sync');
        var data = fs.readFileSync(targetFilePath, { encoding: characterCode });
        return csvSync(data);
    };
    return ReadFileData;
}());
exports.ReadFileData = ReadFileData;
