<template>

    <v-card class="primary ma-1 green lighten-2 text-xs-center">
        <div class='display'>{{this.calc.display}}</div>
        <table>
            <tr v-for="(row) in this.calc.buttons">
                <td v-for="(bt) in row" v-bind:style="{ padding: '0px'}">
                    <v-btn type="button"  large v-bind:class=bt.type @click.native=bt.callback>
                        {{bt.label}}
                    </v-btn>
                </td>
            </tr>
        </table>
    </v-card>

</template>

<script>
    const normalBtCss = 'grey lighten-3';
    const operationsBtCss = 'warning';
    const operationsBtPressedCss = 'highlightPressed';

    export default {
        name: "Calculator",

        methods: {

            init() {
                this.calc.display = '';
                this.calc.inputvalue = null;
                this.calc.isnewvalue = true;
                this.calc.op = null;
            },

            clearAll() {
                this.init();
            },

            setDisplayValue(n) {
                if (this.calc.isnewvalue) {
                    this.calc.display = n.toString();
                    this.calc.isnewvalue = false;
                } else {
                    this.calc.display = this.calc.display + n.toString();
                }
            },

            setDisplaySpecialValue(val) {
                switch (val) {
                    case '.':
                        if (String(this.calc.display).indexOf(val) === -1) {
                            if (this.calc.isnewvalue) {
                                val = '0.';
                                this.calc.display = val.toString();
                                this.calc.isnewvalue = false;
                            }
                            else {
                                this.calc.display = this.calc.display + val.toString();
                            }
                        }
                        break;
                    case '+/-':
                        if (this.calc.display) {
                            this.calc.display = Number(this.calc.display) * -1;
                        }
                        break;

                    default:
                        break;
                }
            },

            setOperation(type) {
                if (type === '=') {
                    this.evaluate();;
                } else if ((this.calc.inputvalue && this.calc.op) && this.calc.op !== '=') {
                    this.evaluate();
                }
                this.calc.op = type;
                this.calc.inputvalue = this.calc.display;
                this.calc.isnewvalue = true;
            },

            evaluate() {
                fetch(this.getURL(this.calc.op, this.calc.inputvalue, this.calc.display))
                    .then(res => res.json())
                    .then(res => {
                        this.showRes(res.output);
                        this.calc.inputvalue = this.calc.display;
                        this.calc.op = null;
                        this.calc.isnewvalue = true;
                    })
                    .catch(err => console.log(err));
            },

            showRes(res) {
                this.calc.display = res;
            },

            getURL(op, operand1, operand2) {
                let url = "";
                switch (op) {
                    case '+':
                         url = 'api/calculator/add/' + operand1 + '/' + operand2
                        break;
                    case '-':
                        url = 'api/calculator/subtract/' + operand1 + '/' + operand2
                        break;
                    case '*':
                        url = 'api/calculator/multiply/'+operand1 + '/' + operand2
                        break;
                    case '/':
                        url = 'api/calculator/divide/' + operand1 + '/' + operand2
                        break;
                    case '√':
                        url = 'api/calculator/squareroot/' + operand1
                        break;
                    case '3√':
                        url = 'api/calculator/qubicroot/' + operand1
                        break;
                    case 'x^y':
                        url = 'api/calculator/power/'+operand1 + '/' + operand2
                        break;
                    case '!':
                        url = 'api/calculator/factorial/' + operand1
                        break;
                    default:
                        break;
                }
                return url;
            }
        },

        mounted() {
            this.init();
        },

        data() {
            return {
                calc: {
                    display: '',
                    inputvalue: null,
                    isnewvalue: true,
                    op: null,
                    operations: ['+', '-', '*', '/', 'x^y', '=', '√', '3√', '!'],

                    buttons: [
                        [
                            { label: 'C', type: normalBtCss, callback: () => { this.clearAll(); } },
                            { label: '+/-', type: normalBtCss, callback: () => { this.setDisplaySpecialValue('+/-'); } },
                            { label: '', type: normalBtCss, callback: () => {  } },
                            { label: '', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => {  } },
                            { label: '', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => {  } },
                        ],
                        [
                            { label: '7', type: normalBtCss, callback: () => { this.setDisplayValue('7'); } },
                            { label: '8', type: normalBtCss, callback: () => { this.setDisplayValue('8'); } },
                            { label: '9', type: normalBtCss, callback: () => { this.setDisplayValue('9'); } },
                            { label: '/', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('/'); } },
                            { label: '!', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('!'); } }
                        ],
                        [
                            { label: '4', type: normalBtCss, callback: () => { this.setDisplayValue('4'); } },
                            { label: '5', type: normalBtCss, callback: () => { this.setDisplayValue('5'); } },
                            { label: '6', type: normalBtCss, callback: () => { this.setDisplayValue('6'); } },
                            { label: '*', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('*'); } },
                            { label: '3√', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('3√'); } }
                        ],
                        [
                            { label: '1', type: normalBtCss, callback: () => { this.setDisplayValue('1'); } },
                            { label: '2', type: normalBtCss, callback: () => { this.setDisplayValue('2'); } },
                            { label: '3', type: normalBtCss, callback: () => { this.setDisplayValue('3'); } },
                            { label: '-', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('-'); } },
                            { label: '√', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('√'); } }
                        ],
                        [
                            { label: '0', type: normalBtCss, callback: () => { this.setDisplayValue('0'); } },
                            { label: '.', type: normalBtCss, callback: () => { this.setDisplaySpecialValue('.'); } },
                            { label: '=', type: `${operationsBtCss}`, callback: () => { this.setOperation('='); } },
                            { label: '+', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('+'); } },
                            { label: 'x^y', type: `${operationsBtCss} ${operationsBtPressedCss}`, callback: () => { this.setOperation('x^y'); } }
                        ]
                    ]
                }
            }
        }
    }
</script>

<style scoped>
    .display {
        height: 4rem;
        background-color: darkgray;
        font-size: 2rem;
        font-weight: 500;
        letter-spacing: .02em;
        will-change: box-shadow;
        box-shadow: 0 1px 5px rgba(0, 0, 0, .2), 0 2px 2px rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12);
        text-align: right;
        padding-left: 1rem;
        padding-right: 1rem;
    }
</style>