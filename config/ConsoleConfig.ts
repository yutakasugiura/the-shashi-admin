interface ConsoleConfig {
    red: String,
    cyan: String,
    yellow: String,
    green: String,
    reset: String
}

const data: ConsoleConfig = {
    red: '\u001b[31m',
    cyan: '\u001b[36m',
    yellow: '\u001b[33m',
    green: '\u001b[32m',
    reset: '\u001b[0m',
}

export default data;
