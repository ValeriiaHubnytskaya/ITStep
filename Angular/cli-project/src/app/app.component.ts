import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  title = 'cli-project';
  hello:String = 'Hello, World!';
  rates:NbuRate[] = [];  // Типизированный массив (от TypeScript)
  btcRate:String = "";
  btcSymbols:String[] = [];
  btcRates:BtcRate[] = [];
  sortMode: string = "";

  constructor( private http: HttpClient ) {
    this.btcSymbols = ["UAH", "XAU", "GBP", "USD", "EUR"]; 
    this.btcRates = [ 
      { symbol: "UAH", rate: 100500 },
      { symbol: "XAU", rate: 200500 },
      { symbol: "GBP", rate: 300500 },
      { symbol: "USD", rate: 400500 },
      { symbol: "EUR", rate: 500500 },
     ] ;

    
  }

  symChange(event:Event):void {
    this.btcRate = (event.target as HTMLInputElement).value;
  }
  
  curBlur(event:Event):void {
    alert((event.target as HTMLInputElement).value);
  }

  symChangeObj(event:Event):void {
    // this.btcRate = this.btcRateObj[(event.target as HTMLInputElement).value];
  }

  ngOnInit(): void {  // LifeCycle event  - событие "встраивания" в HTML
    this.http.get('https://api.exchangerate.host/latest?base=BTC&symbols=USD,UAH,EUR,GBP,XAU')
    .subscribe((resp:any) => {
      // console.log(resp.rates);
      this.btcRates = [];
      for(let sym in resp.rates) {
        this.btcRates.push( { symbol: sym, rate: resp.rates[sym] } );
      }
    });

    this.rates = [
      { r030: 36,
        txt: "Австралійський долар",
        rate: 25.1537,
        cc: "AUD",
        exchangedate: "13.09.2022" 
      },
      {
        r030: 124,
        txt: "Канадський долар",
        rate: 28.1448,
        cc: "CAD",
        exchangedate: "13.09.2022"
      },
      {
        r030: 156,
        txt: "Юань Женьміньбі",
        rate: 5.2795,
        cc: "CNY",
        exchangedate: "13.09.2022"
      },
    ]; 
  }

  loadClick() {
    this.http.get('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json')
    .subscribe( (resp:any) => { this.rates = resp; } );
  }

  trClick(cc:String):void {
    alert(cc);
  }

  trClick2(event:MouseEvent) {
    console.log(event);    
  }
  
  trClick3(rate:NbuRate) {
    console.log(rate);    
  }
  sortr030(){
    if( this.sortMode == "rateAsc")
    {
      this.rates.sort((x,y)=> x.r030 - y.r030);
      this.sortMode = "rateDesc";
    }
    else{
      this.rates.sort((x,y)=> y.r030 - x.r030);
      this.sortMode = "rateAsc";
    }
  }
  sortTxt(){    
    if(this.sortMode == "txtAsc")
                        {
                           this.rates.sort((x,y)=> -x.txt.localeCompare(y.txt,'uk'));
                           this.sortMode = "txtDesc";
                        }
                        else{
                          this.rates.sort((x,y)=> x.txt.localeCompare(y.txt,'uk'));
                          this.sortMode = "txtAsc";
                        }
  } 
  sortRate()
  {
    if( this.sortMode == "rateAsc")
    {
      this.rates.sort((x,y)=> x.rate - y.rate);
      this.sortMode = "rateDesc";
    }
    else{
      this.rates.sort((x,y)=> y.rate - x.rate);
      this.sortMode = "rateAsc";
    }
  }
  sortCc()
  {
    if(this.sortMode == "ccAsc")
    {
      this.rates.sort((x,y)=> -x.cc.localeCompare(y.cc,'en'));
      this.sortMode = "ccDesc";
    }
    else{
      this.rates.sort((x,y)=> x.cc.localeCompare(y.cc,'en'));
      this.sortMode = "ccAsc";
    }
  }
  sortdate(){
    if(this.sortMode == "ccAsc")
    {
      this.rates.sort((x,y)=> -x.exchangedate.localeCompare(y.exchangedate,'en'));
      this.sortMode = "ccDesc";
    }
    else{
      this.rates.sort((x,y)=> x.exchangedate.localeCompare(y.exchangedate,'en'));
      this.sortMode = "ccAsc";
    }
  }
}

export interface NbuRate {  // интерфейсы - дополнения от TypeScript
  r030: number,
  txt: string,
  rate: number,
  cc: string,
  exchangedate: string
}

export interface BtcRate {
  symbol: String,
  rate: Number
}