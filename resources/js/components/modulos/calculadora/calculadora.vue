<template>
<div>
    
    <div class="title-app">
         <h4>Calculadora de Prestamos</h4>               
    </div>
     <div class="card">
      <div class="card-body">
        <div class="col-md-12">
                <div v-if="loading" class=" row loading" style=""> <div class="img-loading"></div> </div>
            <div class="row">

              <div class="col-md-3">
                <div class="form-group" :class="{ 'form_group_error': $v.monto.$error }" >
                  <label class="form__label">Monto</label>
                  <input type="number" class="form-control form__input" v-model="monto"/>
                   <div class="error none" v-if="!$v.monto.required">Cuota requerida</div>
                    <div class="error none" v-if="!$v.monto.minValue">Valor mayor que 999</div>
                </div>
              </div>

               <div class="col-md-2" >
                <div class="form-group" :class="{ 'form_group_error': $v.tasaMensual.$error }">
                  <label class="form__label">Tasa de Interes Mensual%</label>
                  <input type="number" class="form-control form__input" v-model="tasaMensual" v-on:keyup="calcularTasa('mensual')" />
                     <div class="error none" v-if="!$v.tasaMensual.required">Tasa requerida</div>
                    <div class="error none" v-if="!$v.tasaMensual.minValue">Tasa mayor que 0</div>
                </div>
              </div>

                 <div class="col-md-2" >
                <div class="form-group" :class="{ 'form_group_error': $v.tasaAnual.$error }">
                  <label class="form__label">Tasa de Interes Anual%</label>
                  <input type="number" class="form-control form__input" v-model="tasaAnual"  v-on:keyup="calcularTasa('anual')" />
                     <div class="error none" v-if="!$v.tasaAnual.required">Tasa requerida</div>
                    <div class="error none" v-if="!$v.tasaAnual.minValue">Tasa mayor que 0</div>
                </div>
              </div>

              
               <div class="col-md-2">
                <div class="form-group" :class="{ 'form_group_error': $v.cuotas.$error }">
                  <label class="form__label">Numeros de Cuotas</label>
                  <input type="number" class="form-control form__input" v-model="cuotas" />
                    <div class="error none" v-if="!$v.cuotas.required">Cuota requerida</div>
                    <div class="error none" v-if="!$v.cuotas.minValue">Cuota debe ser  mayor que 0</div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group" :class="{ 'form_group_error': $v.modalidadPago.$error }">
                  <label class="form__label">Modalidad de Pago</label>
                   <v-select v-model="modalidadPago" :options="['Mensual','Semanal','Quincenal','Diario']" placeholder="Seleccione..."> </v-select>
                  <div class="error none" v-if="!$v.cuotas.required">Modalidad de pago requerida</div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group" :class="{ 'form_group_error': $v.amortizacion.$error }">
                  <label class="form__label">Amortizacion</label>
                   <v-select v-model="amortizacion" class="form__input" :options="['Disminuir Cuotas (Metodo Aleman)','Cuotas Fijas (Metodo Frances)','Capital al Final (Metodo Americano)','Interes Fijo']" placeholder="Seleccione..."> </v-select>
                 <div class="error none" v-if="!$v.amortizacion.required">Amortizacion requerida</div>
                </div>
              </div>

            <div class="col-md-4">
                <div class="form-group" :class="{ 'form_group_error': $v.fechaPrimerPago.$error }">
                  <label class="form__label">Fecha primer pago</label>
                  <datepicker   v-model="fechaPrimerPago" :format="'YYYY-MM-DD'"  :value-type="'format'"></datepicker>
                     <div class="error none" v-if="!$v.fechaPrimerPago.required">Fecha requerida</div>
                </div>
              </div>

              <div class="col-md-4">
                <button type="button" v-on:click="checkInput" class="btn btn-primary btn-uppercase" style="margin-top: 29px;padding: 11px;">
                    <i class="fas fa-calculator" style="margin-right:6px;"></i>Calcular
                </button>
                   <button type="button" v-on:click="imprimirPdf" class="btn btn-info btn-uppercase" v-if="tablaAmortizada.length > 0"  style="margin-top: 29px;padding: 11px;">
                    <i class="fas fa-print" style="margin-right:6px;"></i>Imprimir
                </button>
              </div>
           
                <div class="col-md-12" style="border-top: 1px solid #cfd7e0;margin-top: 21px;">
                  <h5 style="padding-top: 26px;padding-bottom: 1px;text-align: center;">Detalle del calculo del prestamos</h5>
                  <div style="text-align: center;" class="col-md-12" v-if="tablaAmortizada.length > 0" >
                      <label style="margin-right:5px;" class="wold">Capital: <span style="font-weight:400;" v-text="formatNumber(monto)"></span></label>
                      <label class="wold">Cuotas: <span style="font-weight:400;" v-text="cuotas"></span></label>
                  
                  </div>
              
                <table id="myTable" class="table table-striped table-bordered col-md-12">
                    <thead style="background: #f9bc08;">
                      <tr>
                        <th>#Cuota</th>
                        <th>Fecha</th>
                        <th>Total a Pagar</th>
                        <th>Interes</th>
                        <th>Abono Capital</th>
                        <th>Capital Restante</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="tabla in tablaAmortizada" :key="tabla.numero">
                        <td v-text="tabla.numero"></td>
                        <td v-text="tabla.fecha"></td>
                        <td v-text="'$'+tabla.totalPagar"></td>
                        <td v-text="'$'+tabla.intereses"></td>
                        <td v-text="'$'+tabla.abonoCapital"></td>
                        <td v-text="'$'+tabla.capitalRestante"></td>
                      
                      </tr>
                   </tbody>
                  </table>
                  </div>
        

            </div>
        </div>
      </div>
     </div>
</div>
</template>

<script>
var moment = require('moment');
import print from 'print-js'
import datepicker from 'vue2-datepicker';
import axios from 'axios';
import { required, minValue, requiredIf} from 'vuelidate/lib/validators';
export default {
    data(){
        return{
           loading:false,
            monto:10000,
            tasaAnual:6,
            tasaMensual:5,
            cuotas:6,
            amortizacion:"Interes Fijo",
            modalidadPago:"Mensual",
            fechaPrimerPago:moment().format('YYYY-MM-DD'),
            tablaAmortizada:new Array(),
            interesAcumulado:0,
            sumaInteres:0.0,
            rango:"",
            valor:0,
            interesMensual:0

        }
    }, components: {
        datepicker
    },validations:{
        monto:{
         minValue:minValue(1000),
         required
        },tasaAnual:{
           required,
             minValue:minValue(0.1),
        },tasaMensual:{
           required,
             minValue:minValue(0.1),
        },cuotas:{
            required,
             minValue:minValue(1),
        }, amortizacion:{
            required
        }, modalidadPago:{ 
            required
        },fechaPrimerPago:{
            required
        }

    },methods:{
        checkInput(){
          this.$v.$touch();
            if(!this.$v.$error){
              this.calcularPrestamos();
            }
         
        },calcularPrestamos(){
            this.tablaAmortizada = new Array();
            switch (this.amortizacion) {
              case "Interes Fijo":
                  this.InteresFijo();
                break;
            case "Capital al Final (Metodo Americano)":
                  this.capitalAlFinal();
                break;
            case "Cuotas Fijas (Metodo Frances)":
                  this.metodoFrances();
                break;
            case "Disminuir Cuotas (Metodo Aleman)":
                  this.metodoAleman();
                break;
           
              default:
                break;
            }

        },calcularTasa(valor){
        
          if(valor == "mensual"){
              this.tasaAnual = this.tasaMensual * 12;
                this.tasaAnual = this.tasaAnual.toFixed(2);
          }if(valor == "anual"){

            this.tasaMensual = this.tasaAnual / 12;
            this.tasaMensual = this.tasaMensual.toFixed(2);

          }
        },formatNumber (num) {
	         if (!num || num == 'NaN') return '-';
                if (num == 'Infinity') return '&#x221e;';
                num = num.toString().replace(/\$|\,/g, '');
                if (isNaN(num))
                    num = "0";
                var sign = (num == (num = Math.abs(num)));
                num = Math.floor(num * 100 + 0.50000000001);
                var cents = num % 100;
                num = Math.floor(num / 100).toString();
                if (cents < 10)
                    cents = "0" + cents;
                for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
                    num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
                return (((sign) ? '' : '-') + num + '.' + cents);
        },calcularInteres(){
            //Calculo Mensual 
            if(this.modalidadPago == "Mensual"){
              this.rango = "months"; 
              this.valor = 1;
              this.interesMensual =  this.tasaMensual / 100; // Interes mensual
            } 
            //Calculo Quincenal
            if(this.modalidadPago == "Quincenal"){
              this.rango = "days"; 
              this.valor = 15;
              this.interesMensual =  this.tasaMensual / 100 / 2; // Interes mensual
            } //semanal
            if(this.modalidadPago == "Semanal"){
              this.rango = "days"; 
              this.valor = 7;
              this.interesMensual =  this.tasaMensual / 100 / 4; // Interes mensual 
            } 
            if(this.modalidadPago == "Diario"){
              this.rango = "days"; 
              this.valor = 1;
              this.interesMensual =  this.tasaMensual / 100 / 30; // Interes mensual 
            } 
              
        },InteresFijo(){
            this.calcularInteres();
            var fechaP = moment(this.fechaPrimerPago); // fecha primer pago
            var pago = parseInt(this.monto ) / parseInt(this.cuotas); // Cuota sin intereses mensual 
            var interesAnual = 0;
            var pagoTotal = 0;
            var capitalRestante = 0;
            var inte = parseFloat(this.interesMensual) * parseFloat(this.monto);
           
            interesAnual = parseFloat(this.monto) * this.tasaAnual; // Interes anual
            pagoTotal = parseFloat(pago) + parseFloat( inte); // Cuota mensual con intereses
            capitalRestante = parseFloat(this.monto) - pago; // capital restante 
            var xs = 0;
             this.sumaInteres = 0;
            //calculando la tabla 
            for (let x = 1; x <= this.cuotas;  x++) {
              //add a la matrix 
              this.tablaAmortizada.push({
                numero:x,
                fecha: fechaP.add(xs,this.rango).format('YYYY-MM-DD'),
                totalPagar:this.formatNumber(pagoTotal.toFixed(2)) ,
                capitalRestante:this.formatNumber(capitalRestante.toFixed(2)),
                abonoCapital:this.formatNumber(pago.toFixed(2)),
                intereses:this.formatNumber(inte.toFixed(2))}
              ); 
                // resta el capital restante 
                capitalRestante = capitalRestante - pago;
                xs = this.valor;
                this.sumaInteres += parseFloat(inte.toFixed(2));
             
            }

        },capitalAlFinal(){
         
           this.calcularInteres();
            var fechaP = moment(this.fechaPrimerPago); // fecha primer pago
            var pago = 0; // Cuota sin intereses mensual 
            var interesMensual = 0;
            var interesAnual = 0;
            var pagoTotal = 0;
            var capitalRestante = 0;
            var inte =parseFloat(this.monto) *parseFloat(this.interesMensual); // Interes anual
            pagoTotal = inte; // Cuota mensual con intereses
            capitalRestante = parseFloat(this.monto); // capital restante 
            var xs = 0;
            this.sumaInteres = 0;
            //calculando la tabla 
            for (let x = 1; x <= this.cuotas;  x++) {
              if(x == this.cuotas){
                pagoTotal = parseFloat(this.monto)+ inte;
                pago = parseFloat(this.monto);
                capitalRestante = capitalRestante - pago;
              }
             
              //add a la matrix 
              this.tablaAmortizada.push({
                numero:x,
                fecha: fechaP.add(xs,this.rango).format('YYYY-MM-DD'),
                totalPagar:this.formatNumber(pagoTotal.toFixed(2)) ,
                capitalRestante:this.formatNumber(capitalRestante.toFixed(2)),
                abonoCapital:this.formatNumber(pago.toFixed(2)),
                intereses:this.formatNumber(inte.toFixed(2))}
              ); 
              // resta el capital restante 
              this.sumaInteres += inte;
              xs = this.valor;
              
            }
        },metodoFrances(){
            this.calcularInteres();
            var fechaP = moment(this.fechaPrimerPago); // fecha primer pago
            var pago = this.interesMensual + 1;
            pago = Math.pow(pago, this.cuotas);
            pago = pago - 1;
            pago = this.interesMensual  / pago;
            pago = this.interesMensual  + pago;
            pago = parseInt(this.monto) * pago;
            var capitalRestante = parseFloat(this.monto);
          
            var xs=0;
             this.sumaInteres = 0;
            for (let x = 1; x <= this.cuotas;  x++) {
            
              var inte = this.interesMensual * capitalRestante;
              var capital =  pago.toFixed(2) - inte;
            
              if(x == this.cuotas){
                capitalRestante = capital;
              }
              var restante = capitalRestante.toFixed(2) - capital.toFixed(2)
              //add a la matrix 
              this.tablaAmortizada.push({
                numero:x,
                fecha: fechaP.add(xs,this.rango).format('YYYY-MM-DD'),
                totalPagar:this.formatNumber(pago.toFixed(2)) ,
                intereses:this.formatNumber(inte),
                abonoCapital:this.formatNumber(capital),
                capitalRestante:this.formatNumber(restante.toFixed(2)),
              }); 
              capitalRestante = capitalRestante - capital;
              this.sumaInteres += inte;
              xs = this.valor;

            }
           
        },metodoAleman(){
            this.calcularInteres();
            var fechaP = moment(this.fechaPrimerPago); // fecha primer pago
            var pago =parseFloat(this.monto)  / this.cuotas; // Cuota sin intereses mensual 
            var interesAnual = 0;
            var pagoTotal = 0;
            var capitalRestante = 0;
             this.sumaInteres = 0;
            var inte = 0;
           // interesAnual =  this.monto * this.tasaAnual; // Interes anual
           // pagoTotal = pago + interesMensual; // Cuota mensual con intereses
            capitalRestante =parseFloat(this.monto.toFixed(2)); // capital restante 
             var xs = 0;
            //calculando la tabla 
            for (let x = 1; x <= this.cuotas;  x++) {
             inte = this.interesMensual * parseFloat(capitalRestante.toFixed(2));
             var cuota = inte + pago;
            capitalRestante = capitalRestante - pago;
              //add a la matrix 
              this.tablaAmortizada.push({
                numero:x,
                fecha: fechaP.add(xs,this.rango).format('YYYY-MM-DD'),
                totalPagar:this.formatNumber(cuota.toFixed(2)) ,
                capitalRestante:this.formatNumber(capitalRestante.toFixed(2)),
                abonoCapital:this.formatNumber(pago.toFixed(2)),
                intereses:this.formatNumber(inte.toFixed(2))}
              ); 
              // resta el capital restante 
            
              xs = this.valor;
             this.sumaInteres += parseFloat(inte);
            }
          
     

        },imprimirPdf(){
          let me = this;
          this.loading = true;
          axios.post('pdfcalculadora',{
            'data':this.tablaAmortizada,
            'monto':this.formatNumber(this.monto),
            'interes':this.formatNumber(this.sumaInteres),
            'cuotas':this.cuotas,
            'pago':this.modalidadPago,
            'amortizacion':this.amortizacion,
            'anual':this.tasaAnual,
            'mensual':this.tasaMensual,
            'total':this.formatNumber(parseFloat(this.monto ) + this.sumaInteres)
            }).then(function (response) {
                         printJS('Coopress/public/pdf/calculadora1.pdf');
                         me.loading = false;
          })
          .catch(function (error) {
              console.log(error);
          });  

        },

    }, mounted(){
 
    }
}
</script>
<style scoped>
.mx-datepicker {
  
    width: 80% !important;
}
.wold{
font-weight: bold;
}
</style>