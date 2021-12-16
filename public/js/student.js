var x = 0;
var y = 1;
function fibonaci (a,b) {
    for(let i=0;i<=20;i++){
        let s = a+b;
        console.log(s);
        a = b;
        b = s;
    }
};

function checkNumber(n){
    for(let i=2;i<n;i++){
        if(n%i == 0){
            return `${n} khong la so nguyen to`;
            
        }
    }
    console.log(`${n}  la so nguyen to`)
}

const obj = {
    name: "Nam",
    class: "18IT1",
    KYC: {
        cmnd: "241724533",
        pass: "123456"
    },
    getInfo(){
        console.log(`${this.name} ${this.class} ${this.KYC.cmnd} ${this.KYC.pass}`);
    },
};

const numbers = [3,5,8,9,1,10];

const filtered = numbers.filter(value => value>=3);

const arr = [...numbers,5555555,...filtered];
console.log(...arr);

