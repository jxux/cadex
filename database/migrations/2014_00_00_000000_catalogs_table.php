<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('cat_document_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('short')->nullable();
            $table->string('description');
        });

        DB::table('cat_document_types')->insert([
            ['id' => '01', 'active' => true,  'short' => 'FT', 'description' => 'FACTURA ELECTRÓNICA'],
            ['id' => '03', 'active' => true,  'short' => 'BV', 'description' => 'BOLETA DE VENTA ELECTRÓNICA'],
            ['id' => '07', 'active' => true,  'short' => 'NC', 'description' => 'NOTA DE CRÉDITO'],
            ['id' => '08', 'active' => true,  'short' => 'ND', 'description' => 'NOTA DE DÉBITO'],
            ['id' => '09', 'active' => true,  'short' => null, 'description' => 'GUIA DE REMISIÓN REMITENTE'],
            ['id' => '20', 'active' => true,  'short' => null, 'description' => 'COMPROBANTE DE RETENCIÓN ELECTRÓNICA'],
            ['id' => '31', 'active' => true,  'short' => null, 'description' => 'Guía de remisión transportista'],
            ['id' => '40', 'active' => true,  'short' => null, 'description' => 'COMPROBANTE DE PERCEPCIÓN ELECTRÓNICA'],
            ['id' => '71', 'active' => false, 'short' => null, 'description' => 'Guia de remisión remitente complementaria'],
            ['id' => '72', 'active' => false, 'short' => null, 'description' => 'Guia de remisión transportista complementaria'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_currency_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('symbol')->nullable();
            $table->string('description');
        });

        DB::table('cat_currency_types')->insert([
            ['id' => 'PEN', 'active' => true, 'symbol' => 'S/', 'description' => 'Soles'],
            ['id' => 'USD', 'active' => true, 'symbol' => '$',  'description' => 'Dólares Americanos'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_unit_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('symbol')->nullable();
            $table->string('description');
        });

        DB::table('cat_unit_types')->insert([
            ['id' => 'ZZ',  'active' => true, 'symbol' => null, 'description' => 'Servicio'],
            ['id' => 'BX',  'active' => true, 'symbol' => null, 'description' => 'Caja'],
            ['id' => 'GLL', 'active' => true, 'symbol' => null, 'description' => 'Galones'],
            ['id' => 'GRM', 'active' => true, 'symbol' => null, 'description' => 'Gramos'],
            ['id' => 'KGM', 'active' => true, 'symbol' => null, 'description' => 'Kilos'],
            ['id' => 'LTR', 'active' => true, 'symbol' => null, 'description' => 'Litros'],
            ['id' => 'MTR', 'active' => true, 'symbol' => null, 'description' => 'Metros'],
            ['id' => 'FOT', 'active' => true, 'symbol' => null, 'description' => 'Pies'],
            ['id' => 'INH', 'active' => true, 'symbol' => null, 'description' => 'Pulgadas'],
            ['id' => 'NIU', 'active' => true, 'symbol' => null, 'description' => 'Unidades'],
            ['id' => 'YRD', 'active' => true, 'symbol' => null, 'description' => 'Yardas'],
            ['id' => 'HUR', 'active' => true, 'symbol' => null, 'description' => 'Hora'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_identity_document_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_identity_document_types')->insert([
            ['id' => '0', 'active' => true,  'description' => 'Doc.trib.no.dom.sin.ruc'],
            ['id' => '1', 'active' => true,  'description' => 'DNI'],
            ['id' => '4', 'active' => true,  'description' => 'CE'],
            ['id' => '6', 'active' => true,  'description' => 'RUC'],
            ['id' => '7', 'active' => true,  'description' => 'Pasaporte'],
            ['id' => 'A', 'active' => false, 'description' => 'Ced. Diplomática de identidad'],
            ['id' => 'B', 'active' => false, 'description' => 'Documento identidad país residencia-no.d'],
            ['id' => 'C', 'active' => false, 'description' => 'Tax Identification Number - TIN – Doc Trib PP.NN'],
            ['id' => 'D', 'active' => false, 'description' => 'Identification Number - IN – Doc Trib PP. JJ'],
            ['id' => 'E', 'active' => false, 'description' => 'TAM- Tarjeta Andina de Migración'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_affectation_igv_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->boolean('exportation')->nullable();
            $table->boolean('free')->nullable();
            $table->string('description');
        });

        DB::table('cat_affectation_igv_types')->insert([
            ['id' => '10', 'active' => true,  'exportation' => false, 'free' => false, 'description' => 'Gravado - Operación Onerosa'],
            ['id' => '11', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Retiro por premio'],
            ['id' => '12', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Retiro por donación'],
            ['id' => '13', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Retiro'],
            ['id' => '14', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Retiro por publicidad'],
            ['id' => '15', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Bonificaciones'],
            ['id' => '16', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Gravado – Retiro por entrega a trabajadores'],
            ['id' => '17', 'active' => false, 'exportation' => false, 'free' => true,  'description' => 'Gravado – IVAP'],
            ['id' => '20', 'active' => true,  'exportation' => false, 'free' => false, 'description' => 'Exonerado - Operación Onerosa'],
            ['id' => '21', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Exonerado – Transferencia Gratuita'],
            ['id' => '30', 'active' => true,  'exportation' => false, 'free' => false, 'description' => 'Inafecto - Operación Onerosa'],
            ['id' => '31', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto – Retiro por Bonificación'],
            ['id' => '32', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto – Retiro'],
            ['id' => '33', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto – Retiro por Muestras Médicas'],
            ['id' => '34', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto - Retiro por Convenio Colectivo'],
            ['id' => '35', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto – Retiro por premio'],
            ['id' => '36', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto - Retiro por publicidad'],
            ['id' => '37', 'active' => true,  'exportation' => false, 'free' => true,  'description' => 'Inafecto - Transferencia gratuita'],
            ['id' => '40', 'active' => true,  'exportation' => true,  'free' => false, 'description' => 'Exportación de bienes o servicios'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_system_isc_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_system_isc_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Sistema al valor'],
            ['id' => '02', 'active' => true, 'description' => 'Aplicación del Monto Fijo'],
            ['id' => '03', 'active' => true, 'description' => 'Sistema de Precios de Venta al Público'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_note_credit_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_note_credit_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Anulación de la operación'],
            ['id' => '02', 'active' => true, 'description' => 'Anulación por error en el RUC'],
            ['id' => '03', 'active' => true, 'description' => 'Corrección por error en la descripción'],
            ['id' => '04', 'active' => true, 'description' => 'Descuento global'],
            ['id' => '05', 'active' => true, 'description' => 'Descuento por ítem'],
            ['id' => '06', 'active' => true, 'description' => 'Devolución total'],
            ['id' => '07', 'active' => true, 'description' => 'Devolución por ítem'],
            ['id' => '08', 'active' => true, 'description' => 'Bonificación'],
            ['id' => '09', 'active' => true, 'description' => 'Disminución en el valor'],
            ['id' => '10', 'active' => true, 'description' => 'Otros Conceptos'],
            ['id' => '11', 'active' => true, 'description' => 'Ajustes de operaciones de exportación'],
            ['id' => '12', 'active' => true, 'description' => 'Ajustes afectos al IVAP'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_note_debit_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_note_debit_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Intereses por mora'],
            ['id' => '02', 'active' => true, 'description' => 'Aumento en el valor'],
            ['id' => '03', 'active' => true, 'description' => 'Penalidades/ otros conceptos'],
            ['id' => '10', 'active' => true, 'description' => 'Ajustes de operaciones de exportación'],
            ['id' => '11', 'active' => true, 'description' => 'Ajustes afectos al IVAP'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_related_tax_document_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_related_tax_document_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Factura – emitida para corregir error en el RUC'],
            ['id' => '02', 'active' => true, 'description' => 'Factura – emitida por anticipos'],
            ['id' => '03', 'active' => true, 'description' => 'Boleta de Venta – emitida por anticipos'],
            ['id' => '04', 'active' => true, 'description' => 'Ticket de Salida - ENAPU'],
            ['id' => '05', 'active' => true, 'description' => 'Código SCOP'],
            ['id' => '99', 'active' => true, 'description' => 'Otros'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_other_tax_concept_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_other_tax_concept_types')->insert([
            ['id' => '1000', 'active' => true, 'description' => 'Total valor de venta - operaciones exportadas'],
            ['id' => '1001', 'active' => true, 'description' => 'Total valor de venta - operaciones gravadas'],
            ['id' => '1002', 'active' => true, 'description' => 'Total valor de venta - operaciones inafectas'],
            ['id' => '1003', 'active' => true, 'description' => 'Total valor de venta - operaciones exoneradas'],
            ['id' => '1004', 'active' => true, 'description' => 'Total valor de venta – Operaciones gratuitas'],
            ['id' => '1005', 'active' => true, 'description' => 'Sub total de venta'],
            ['id' => '2001', 'active' => true, 'description' => 'Percepciones'],
            ['id' => '2002', 'active' => true, 'description' => 'Retenciones'],
            ['id' => '2003', 'active' => true, 'description' => 'Detracciones'],
            ['id' => '2004', 'active' => true, 'description' => 'Bonificaciones'],
            ['id' => '2005', 'active' => true, 'description' => 'Total descuentos'],
            ['id' => '3001', 'active' => true, 'description' => 'FISE (Ley 29852) Fondo Inclusión Social Energético'],
        ]);
        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_price_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_price_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Precio unitario (incluye el IGV)'],
            ['id' => '02', 'active' => true, 'description' => 'Valor referencial unitario en operaciones no onerosas'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_transport_mode_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_transport_mode_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Transporte público'],
            ['id' => '02', 'active' => true, 'description' => 'Transporte privado'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_summary_status_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_summary_status_types')->insert([
            ['id' => '1', 'active' => true, 'description' => 'Adicionar'],
            ['id' => '2', 'active' => true, 'description' => 'Modificar'],
            ['id' => '3', 'active' => true, 'description' => 'Anulado'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_transfer_reason_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_transfer_reason_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Venta'],
            ['id' => '02', 'active' => true, 'description' => 'Compra'],
            ['id' => '04', 'active' => true, 'description' => 'Traslado entre establecimientos de la misma empresa'],
            ['id' => '08', 'active' => true, 'description' => 'Importación'],
            ['id' => '09', 'active' => true, 'description' => 'Exportación'],
            ['id' => '13', 'active' => true, 'description' => 'Otros'],
            ['id' => '14', 'active' => true, 'description' => 'Venta sujeta a confirmación del comprador'],
            ['id' => '18', 'active' => true, 'description' => 'Traslado emisor itinerante CP'],
            ['id' => '19', 'active' => true, 'description' => 'Traslado a zona primaria'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_related_documents_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_related_documents_types')->insert([
            ['id' => '01', 'active' => true, 'description' => 'Numeración DAM'],
            ['id' => '02', 'active' => true, 'description' => 'Número de orden de entrega'],
            ['id' => '03', 'active' => true, 'description' => 'Número SCOP'],
            ['id' => '04', 'active' => true, 'description' => 'Número de manifiesto de carga'],
            ['id' => '05', 'active' => true, 'description' => 'Número de constancia de detracción'],
            ['id' => '06', 'active' => true, 'description' => 'Otros'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_perception_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->decimal('percentage', 10, 2);
            $table->string('description');
        });

        DB::table('cat_perception_types')->insert([
            ['id' => '01', 'active' => true, 'percentage' => 2,   'description' => 'Percepción Venta Interna'],
            ['id' => '02', 'active' => true, 'percentage' => 1,   'description' => 'Percepción a la adquisición de combustible'],
            ['id' => '03', 'active' => true, 'percentage' => 0.5, 'description' => 'Percepción realizada al agente de percepción con tasa especial'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_retention_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->decimal('percentage', 10, 2);
            $table->string('description');
        });

        DB::table('cat_retention_types')->insert([
            ['id' => '01', 'active' => true, 'percentage' => 3, 'description' => 'Tasa 3%'],
            ['id' => '02', 'active' => true, 'percentage' => 6, 'description' => 'Tasa 6%'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_operation_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->boolean('exportation');
            $table->string('description');
        });

        DB::table('cat_operation_types')->insert([
            ['id' => '0101', 'active' => true,  'exportation' => false, 'description' => 'Venta interna'],
            ['id' => '0112', 'active' => false, 'exportation' => false, 'description' => 'Venta Interna - Sustenta Gastos Deducibles Persona Natural'],
            ['id' => '0113', 'active' => false, 'exportation' => false, 'description' => 'Venta Interna - NRUS'],
            ['id' => '0200', 'active' => true,  'exportation' => true,  'description' => 'Exportación de Bienes'],
            ['id' => '0201', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Prestación servicios realizados íntegramente en el país'],
            ['id' => '0202', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Prestación de servicios de hospedaje No Domiciliado'],
            ['id' => '0203', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Transporte de navieras'],
            ['id' => '0204', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Servicios a naves y aeronaves de bandera extranjera'],
            ['id' => '0205', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios - Servicios que conformen un Paquete Turístico'],
            ['id' => '0206', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Servicios complementarios al transporte de carga'],
            ['id' => '0207', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Suministro de energía eléctrica a favor de sujetos domiciliados en ZED'],
            ['id' => '0208', 'active' => false, 'exportation' => true,  'description' => 'Exportación de Servicios – Prestación servicios realizados parcialmente en el extranjero'],
            ['id' => '0301', 'active' => false, 'exportation' => false, 'description' => 'Operaciones con Carta de porte aéreo (emitidas en el ámbito nacional)'],
            ['id' => '0302', 'active' => false, 'exportation' => false, 'description' => 'Operaciones de Transporte ferroviario de pasajeros'],
            ['id' => '0303', 'active' => false, 'exportation' => false, 'description' => 'Operaciones de Pago de regalía petrolera'],
            ['id' => '0401', 'active' => false, 'exportation' => false, 'description' => 'Ventas no domiciliados que no califican como exportación'],
            ['id' => '1001', 'active' => false, 'exportation' => false, 'description' => 'Operación Sujeta a Detracción'],
            ['id' => '1002', 'active' => false, 'exportation' => false, 'description' => 'Operación Sujeta a Detracción- Recursos Hidrobiológicos'],
            ['id' => '1003', 'active' => false, 'exportation' => false, 'description' => 'Operación Sujeta a Detracción- Servicios de Transporte Pasajeros'],
            ['id' => '1004', 'active' => false, 'exportation' => false, 'description' => 'Operación Sujeta a Detracción- Servicios de Transporte Carga'],
            ['id' => '2001', 'active' => false, 'exportation' => false, 'description' => 'Operación Sujeta a Percepción'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_legend_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_legend_types')->insert([
            ['id' => '1000', 'active' => true, 'description' => 'Monto en Letras'],
            ['id' => '1002', 'active' => true, 'description' => 'TRANSFERENCIA GRATUITA DE UN BIEN Y/O SERVICIO PRESTADO GRATUITAMENTE'],
            ['id' => '2000', 'active' => true, 'description' => 'COMPROBANTE DE PERCEPCIÓN'],
            ['id' => '2001', 'active' => true, 'description' => 'BIENES TRANSFERIDOS EN LA AMAZONÍA REGIÓN SELVA PARA SER CONSUMIDOS EN LA MISMA'],
            ['id' => '2002', 'active' => true, 'description' => 'SERVICIOS PRESTADOS EN LA AMAZONÍA  REGIÓN SELVA PARA SER CONSUMIDOS EN LA MISMA'],
            ['id' => '2003', 'active' => true, 'description' => 'CONTRATOS DE CONSTRUCCIÓN EJECUTADOS  EN LA AMAZONÍA REGIÓN SELVA'],
            ['id' => '2004', 'active' => true, 'description' => 'Agencia de Viaje - Paquete turístico'],
            ['id' => '2005', 'active' => true, 'description' => 'Venta realizada por emisor itinerante'],
            ['id' => '2006', 'active' => true, 'description' => 'Operación sujeta a detracción'],
            ['id' => '2007', 'active' => true, 'description' => 'Operación sujeta al IVAP'],
            ['id' => '2008', 'active' => true, 'description' => 'VENTA EXONERADA DEL IGV-ISC-IPM. PROHIBIDA LA VENTA FUERA DE LA ZONA COMERCIAL DE TACNA'],
            ['id' => '2009', 'active' => true, 'description' => 'PRIMERA VENTA DE MERCANCÍA IDENTIFICABLE ENTRE USUARIOS DE LA ZONA COMERCIAL'],
            ['id' => '2010', 'active' => true, 'description' => 'Restitucion Simplificado de Derechos Arancelarios'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_charge_discount_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->boolean('base');
            $table->enum('level', ['item', 'global']);
            $table->enum('type', ['discount', 'charge']);
            $table->string('description');
        });

        DB::table('cat_charge_discount_types')->insert([
            ['id' => '00', 'active' => true,  'base' => true,  'level' => 'item',   'type' => 'discount', 'description' => 'Descuentos que afectan la base imponible del IGV/IVAP'],
            ['id' => '01', 'active' => true,  'base' => false, 'level' => 'item',   'type' => 'discount', 'description' => 'Descuentos que no afectan la base imponible del IGV/IVAP'],
            ['id' => '02', 'active' => true,  'base' => true,  'level' => 'global', 'type' => 'discount', 'description' => 'Descuentos globales que afectan la base imponible del IGV/IVAP'],
            ['id' => '03', 'active' => true,  'base' => false, 'level' => 'global', 'type' => 'discount', 'description' => 'Descuentos globales que no afectan la base imponible del IGV/IVAP'],
            ['id' => '04', 'active' => false, 'base' => true,  'level' => 'global', 'type' => 'discount', 'description' => 'Descuentos globales por anticipos gravados que afectan la base imponible del IGV/IVAP'],
            ['id' => '05', 'active' => false, 'base' => false, 'level' => 'global', 'type' => 'discount', 'description' => 'Descuentos globales por anticipos exonerados'],
            ['id' => '06', 'active' => false, 'base' => false, 'level' => 'global', 'type' => 'discount', 'description' => 'Descuentos globales por anticipos inafectos'],
            ['id' => '45', 'active' => false, 'base' => true,  'level' => 'global', 'type' => 'charge',   'description' => 'FISE'],
            ['id' => '46', 'active' => true,  'base' => false, 'level' => 'global', 'type' => 'charge',   'description' => 'Recargo al consumo y/o propinas'],
            ['id' => '47', 'active' => true,  'base' => true,  'level' => 'item',   'type' => 'charge',   'description' => 'Cargos que afectan la base imponible del IGV/IVAP'],
            ['id' => '48', 'active' => true,  'base' => false, 'level' => 'item',   'type' => 'charge',   'description' => 'Cargos que no afectan la base imponible del IGV/IVAP'],
            ['id' => '49', 'active' => true,  'base' => true,  'level' => 'global', 'type' => 'charge',   'description' => 'Cargos globales que afectan la base imponible del IGV/IVAP'],
            ['id' => '50', 'active' => true,  'base' => false, 'level' => 'global', 'type' => 'charge',   'description' => 'Cargos globales que no afectan la base imponible del IGV/IVAP'],
            ['id' => '51', 'active' => false, 'base' => true,  'level' => 'global', 'type' => 'charge',   'description' => 'Percepción venta interna'],
            ['id' => '52', 'active' => false, 'base' => true,  'level' => 'global', 'type' => 'charge',   'description' => 'Percepción a la adquisición de combustible'],
            ['id' => '53', 'active' => false, 'base' => true,  'level' => 'global', 'type' => 'charge',   'description' => 'Percepción realizada al agente de percepción con tasa especial'],
        ]);
        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_attribute_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_attribute_types')->insert([
            ['id' => '3001', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Matrícula de la embarcación'],
            ['id' => '3002', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Nombre de la embarcación'],
            ['id' => '3003', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Tipo de especie vendida'],
            ['id' => '3004', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Lugar de descarga'],
            ['id' => '3005', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Fecha de descarga'],
            ['id' => '3006', 'active' => true, 'description' => 'Detracciones: Recursos Hidrobiológicos-Cantidad de especie vendida'],
            ['id' => '3050', 'active' => true, 'description' => 'Transportre Terreste - Número de asiento'],
            ['id' => '3051', 'active' => true, 'description' => 'Transporte Terrestre - Información de manifiesto de pasajeros'],
            ['id' => '3052', 'active' => true, 'description' => 'Transporte Terrestre - Número de documento de identidad del pasajero'],
            ['id' => '3053', 'active' => true, 'description' => 'Transporte Terrestre - Tipo de documento de identidad del pasajero'],
            ['id' => '3054', 'active' => true, 'description' => 'Transporte Terrestre - Nombres y apellidos del pasajero'],
            ['id' => '3055', 'active' => true, 'description' => 'Transporte Terrestre - Ciudad o lugar de destino - Ubigeo'],
            ['id' => '3056', 'active' => true, 'description' => 'Transporte Terrestre - Ciudad o lugar de destino - Dirección detallada'],
            ['id' => '3057', 'active' => true, 'description' => 'Transporte Terrestre - Ciudad o lugar de origen - Ubigeo'],
            ['id' => '3058', 'active' => true, 'description' => 'Transporte Terrestre - Ciudad o lugar de origen - Dirección detallada'],
            ['id' => '3059', 'active' => true, 'description' => 'Transporte Terrestre - Fecha de inicio programado'],
            ['id' => '3060', 'active' => true, 'description' => 'Transporte Terrestre - Hora de inicio programado'],
            ['id' => '4000', 'active' => true, 'description' => 'Beneficio Hospedajes-Paquete turístico: Código de país de emisión del pasaporte'],
            ['id' => '4001', 'active' => true, 'description' => 'Beneficio Hospedajes: Código de país de residencia del sujeto no domiciliado'],
            ['id' => '4002', 'active' => true, 'description' => 'Beneficio Hospedajes: Fecha de ingreso al país'],
            ['id' => '4003', 'active' => true, 'description' => 'Beneficio Hospedajes: Fecha de Ingreso al Establecimiento'],
            ['id' => '4004', 'active' => true, 'description' => 'Beneficio Hospedajes: Fecha de Salida del Establecimiento'],
            ['id' => '4005', 'active' => true, 'description' => 'Beneficio Hospedajes: Número de Días de Permanencia'],
            ['id' => '4006', 'active' => true, 'description' => 'Beneficio Hospedajes: Fecha de Consumo'],
            ['id' => '4007', 'active' => true, 'description' => 'Beneficio Hospedajes-Paquete turístico: Nombres y apellidos del huesped'],
            ['id' => '4008', 'active' => true, 'description' => 'Beneficio Hospedajes-Paquete turístico: Tipo de documento de identidad del huesped'],
            ['id' => '4009', 'active' => true, 'description' => 'Beneficio Hospedajes-Paquete turístico: Número de documento de identidad del huesped'],
            ['id' => '4030', 'active' => true, 'description' => 'Carta Porte Aéreo:  Lugar de origen - Código de ubigeo'],
            ['id' => '4031', 'active' => true, 'description' => 'Carta Porte Aéreo:  Lugar de origen - Dirección detallada'],
            ['id' => '4032', 'active' => true, 'description' => 'Carta Porte Aéreo:  Lugar de destino - Código de ubigeo'],
            ['id' => '4033', 'active' => true, 'description' => 'Carta Porte Aéreo:  Lugar de destino - Dirección detallada'],
            ['id' => '4040', 'active' => true, 'description' => 'BVME transporte ferroviario: Pasajero - Apellidos y Nombres'],
            ['id' => '4041', 'active' => true, 'description' => 'BVME transporte ferroviario: Pasajero - Tipo de documento de identidad'],
            ['id' => '4042', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Ciudad o lugar de origen - Código de ubigeo'],
            ['id' => '4043', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Ciudad o lugar de origen - Dirección detallada'],
            ['id' => '4044', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Ciudad o lugar de destino - Código de ubigeo'],
            ['id' => '4045', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Ciudad o lugar de destino - Dirección detallada'],
            ['id' => '4046', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte:Número de asiento'],
            ['id' => '4047', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Hora programada de inicio de viaje'],
            ['id' => '4048', 'active' => true, 'description' => 'BVME transporte ferroviario: Servicio transporte: Fecha programada de inicio de viaje'],
            ['id' => '4049', 'active' => true, 'description' => 'BVME transporte ferroviario: Pasajero - Número de documento de identidad'],
            ['id' => '4060', 'active' => true, 'description' => 'Regalía Petrolera: Decreto Supremo de aprobación del contrato'],
            ['id' => '4061', 'active' => true, 'description' => 'Regalía Petrolera: Area de contrato (Lote)'],
            ['id' => '4062', 'active' => true, 'description' => 'Regalía Petrolera: Periodo de pago - Fecha de inicio'],
            ['id' => '4063', 'active' => true, 'description' => 'Regalía Petrolera: Periodo de pago - Fecha de fin'],
            ['id' => '4064', 'active' => true, 'description' => 'Regalía Petrolera: Fecha de Pago'],
            ['id' => '5000', 'active' => true, 'description' => 'Proveedores Estado: Número de Expediente'],
            ['id' => '5001', 'active' => true, 'description' => 'Proveedores Estado: Código de Unidad Ejecutora'],
            ['id' => '5002', 'active' => true, 'description' => 'Proveedores Estado: N° de Proceso de Selección'],
            ['id' => '5003', 'active' => true, 'description' => 'Proveedores Estado: N° de Contrato'],
            ['id' => '5010', 'active' => true, 'description' => 'Numero de Placa'],
            ['id' => '5011', 'active' => true, 'description' => 'Categoria'],
            ['id' => '5012', 'active' => true, 'description' => 'Marca'],
            ['id' => '5013', 'active' => true, 'description' => 'Modelo'],
            ['id' => '5014', 'active' => true, 'description' => 'Color'],
            ['id' => '5015', 'active' => true, 'description' => 'Motor'],
            ['id' => '5016', 'active' => true, 'description' => 'Combustible'],
            ['id' => '5017', 'active' => true, 'description' => 'Form. Rodante'],
            ['id' => '5018', 'active' => true, 'description' => 'VIN'],
            ['id' => '5019', 'active' => true, 'description' => 'Serie/Chasis'],
            ['id' => '5020', 'active' => true, 'description' => 'Año fabricacion'],
            ['id' => '5021', 'active' => true, 'description' => 'Año modelo'],
            ['id' => '5022', 'active' => true, 'description' => 'Version'],
            ['id' => '5023', 'active' => true, 'description' => 'Ejes'],
            ['id' => '5024', 'active' => true, 'description' => 'Asientos'],
            ['id' => '5025', 'active' => true, 'description' => 'Pasajeros'],
            ['id' => '5026', 'active' => true, 'description' => 'Ruedas'],
            ['id' => '5027', 'active' => true, 'description' => 'Carroceria'],
            ['id' => '5028', 'active' => true, 'description' => 'Potencia'],
            ['id' => '5029', 'active' => true, 'description' => 'Cilindros'],
            ['id' => '5030', 'active' => true, 'description' => 'Ciliindrada'],
            ['id' => '5031', 'active' => true, 'description' => 'Peso Bruto'],
            ['id' => '5032', 'active' => true, 'description' => 'Peso Neto'],
            ['id' => '5033', 'active' => true, 'description' => 'Carga Util'],
            ['id' => '5034', 'active' => true, 'description' => 'Longitud'],
            ['id' => '5035', 'active' => true, 'description' => 'Altura'],
            ['id' => '5036', 'active' => true, 'description' => 'Ancho'],
            ['id' => '6000', 'active' => true, 'description' => 'Comercialización de Oro:  Código Unico Concesión Minera'],
            ['id' => '6001', 'active' => true, 'description' => 'Comercialización de Oro:  N° declaración compromiso'],
            ['id' => '6002', 'active' => true, 'description' => 'Comercialización de Oro:  N° Reg. Especial .Comerci. Oro'],
            ['id' => '6003', 'active' => true, 'description' => 'Comercialización de Oro:  N° Resolución que autoriza Planta de Beneficio'],
            ['id' => '6004', 'active' => true, 'description' => 'Comercialización de Oro: Ley Mineral (% concent. oro)'],
            ['id' => '7000', 'active' => true, 'description' => 'Gastos Art. 37 Renta:  Número de Placa'],
            ['id' => '7001', 'active' => true, 'description' => 'Créditos Hipotecarios: Tipo de préstamo'],
            ['id' => '7002', 'active' => true, 'description' => 'Créditos Hipotecarios: Indicador de Primera Vivienda'],
            ['id' => '7003', 'active' => true, 'description' => 'Créditos Hipotecarios: Partida Registral'],
            ['id' => '7004', 'active' => true, 'description' => 'Créditos Hipotecarios: Número de contrato'],
            ['id' => '7005', 'active' => true, 'description' => 'Créditos Hipotecarios: Fecha de otorgamiento del crédito'],
            ['id' => '7006', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Código de ubigeo'],
            ['id' => '7007', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Dirección completa'],
            ['id' => '7008', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Urbanización'],
            ['id' => '7009', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Provincia'],
            ['id' => '7010', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Distrito'],
            ['id' => '7011', 'active' => true, 'description' => 'Créditos Hipotecarios: Dirección del predio - Departamento'],
            ['id' => '7020', 'active' => true, 'description' => 'Partida Arancelaria'],
        ]);

        /*
         ***************************************************************************************************************
         ***************************************************************************************************************
         ***************************************************************************************************************
         */
        Schema::create('cat_payment_method_types', function (Blueprint $table) {
            $table->string('id')->index();
            $table->boolean('active');
            $table->string('description');
        });

        DB::table('cat_payment_method_types')->insert([
            ['id' => '001', 'active' => true, 'description' => 'Depósito en cuenta'],
            ['id' => '002', 'active' => true, 'description' => 'Giro'],
            ['id' => '003', 'active' => true, 'description' => 'Transferencia de fondos'],
            ['id' => '004', 'active' => true, 'description' => 'Orden de pago'],
            ['id' => '005', 'active' => true, 'description' => 'Tarjeta de débito'],
            ['id' => '006', 'active' => true, 'description' => 'Tarjeta de crédito emitida en el país por una empresa del sistema financiero'],
            ['id' => '007', 'active' => true, 'description' => 'Cheques con la cláusula de "NO NEGOCIABLE", "INTRANSFERIBLES", "NO A LA ORDEN" u otra equivalente, a que se refiere el inciso g) del artículo 5° de la ley'],
            ['id' => '008', 'active' => true, 'description' => 'Efectivo, por operaciones en las que no existe obligación de utilizar medio de pago'],
            ['id' => '009', 'active' => true, 'description' => 'Efectivo, en los demás casos'],
            ['id' => '010', 'active' => true, 'description' => 'Medios de pago usados en comercio exterior'],
            ['id' => '011', 'active' => true, 'description' => 'Documentos emitidos por las EDPYMES y las cooperativas de ahorro y crédito no autorizadas a captar depósitos del público'],
            ['id' => '012', 'active' => true, 'description' => 'Tarjeta de crédito emitida en el país o en el exterior por una empresa no perteneciente al sistema financiero, cuyo objeto principal sea la emisión y administración de tarjetas de crédito'],
            ['id' => '013', 'active' => true, 'description' => 'Tarjetas de crédito emitidas en el exterior por empresas bancarias o financieras no domiciliadas'],
            ['id' => '101', 'active' => true, 'description' => 'Transferencias – Comercio exterior'],
            ['id' => '102', 'active' => true, 'description' => 'Cheques bancarios - Comercio exterior'],
            ['id' => '103', 'active' => true, 'description' => 'Orden de pago simple - Comercio exterior'],
            ['id' => '104', 'active' => true, 'description' => 'Orden de pago documentario - Comercio exterior'],
            ['id' => '105', 'active' => true, 'description' => 'Remesa simple - Comercio exterior'],
            ['id' => '106', 'active' => true, 'description' => 'Remesa documentaria - Comercio exterior'],
            ['id' => '107', 'active' => true, 'description' => 'Carta de crédito simple - Comercio exterior'],
            ['id' => '108', 'active' => true, 'description' => 'Carta de crédito documentario - Comercio exterior'],
            ['id' => '999', 'active' => true, 'description' => 'Otros medios de pago']
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_payment_method_types');
        Schema::dropIfExists('cat_attribute_types');
        Schema::dropIfExists('cat_charge_discount_types');
        Schema::dropIfExists('cat_legend_types');
        Schema::dropIfExists('cat_operation_types');
        Schema::dropIfExists('cat_retention_types');
        Schema::dropIfExists('cat_perception_types');
        Schema::dropIfExists('cat_related_documents_types');
        Schema::dropIfExists('cat_transfer_reason_types');
        Schema::dropIfExists('cat_summary_status_types');
        Schema::dropIfExists('cat_transport_mode_types');
        Schema::dropIfExists('cat_price_types');
        Schema::dropIfExists('cat_other_tax_concept_types');
        Schema::dropIfExists('cat_related_tax_document_types');
        Schema::dropIfExists('cat_note_debit_types');
        Schema::dropIfExists('cat_note_credit_types');
        Schema::dropIfExists('cat_system_isc_types');
        Schema::dropIfExists('cat_affectation_igv_types');
        Schema::dropIfExists('cat_identity_document_types');
        Schema::dropIfExists('cat_unit_types');
        Schema::dropIfExists('cat_currency_types');
        Schema::dropIfExists('cat_document_types');

    }
}
