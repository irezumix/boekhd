<input type="hidden" id="klant_id" name="klant_id" value="{{ old('klant_id', $invoice->klant_id )}}">
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            Soort
        </div>
        <div class="col-sm-10">
            <select id="inkomend" name="inkomend" class="form-control">
                <option value="0" {{($invoice->inkomend == 0) ? 'selected': ''}}>aankoopfactuur</option>
                <option value="1" {{($invoice->inkomend == 1) ? 'selected': ''}}>verkoopfactuur</option>
            </select>
            @if($errors->has('inkomend'))
                <span class="error">
                    {{ $errors->first('inkomend') }}
                </span>
            @endif
        </div>
        <div class="col-sm-2">
            <label for="factuurnummer">Factuurnummer</label>
        </div>
        <div class="col-sm-10">
            <input type="text" id="factuurnummer" name="factuurnummer" value="{{ old('factuurnummer', $invoice->factuurnummer )}}" class='form-control'>
            @if($errors->has('factuurnummer'))
                <span class="error">
                    {{ $errors->first('factuurnummer') }}
                </span>
            @endif
        </div>
        <div class="col-md-2 col-sm-2">Datum</div>
        <div class="col-md-4 col-sm-10">
                <input type="date" id="datum" name="datum" value="{{ date_format($invoice->datum,"Y-m-d")}}" class='form-control'>
                @if($errors->has('datum'))
                    <span class="error">
                        {{ $errors->first('datum') }}
                    </span>
                @endif
        </div>
        <div class="col-md-2 col-sm-2">Vervaldatum</div>
        <div class="col-md-4 col-sm-10">
                <input type="date" id="vervaldatum" name="vervaldatum" value="{{ date_format($invoice->vervaldatum,"Y-m-d")}}" class='form-control'>
                @if($errors->has('vervaldatum'))
                    <span class="error">
                        {{ $errors->first('vervaldatum') }}
                    </span>
                @endif
        </div>
        <div class="col-sm-2">Bedrag excl. btw</div>
        <div class="col-sm-10">
                <input type="text" id="bedrag_excl" name="bedrag_excl" value="{{ old('bedrag_excl', $invoice->bedrag_excl)}}" class='form-control'>
                @if($errors->has('bedrag_excl'))
                    <span class="error">
                        {{ $errors->first('bedrag_excl') }}
                    </span>
                @endif
        </div>
        <div class="col-sm-2">BTW-precentage</div>
        <div class="col-sm-10">
                <select id="betaald" name="btw" class="form-control">
                        <option disabled selected>-- KIES BTW-PERCENTAGE --</option>
                        <option value="21" {{($invoice->btw == 21) ? 'selected': ''}}>21%</option>
                        <option value="6" {{($invoice->btw == 6) ? 'selected': ''}}>6%</option>
                        <option value="0" {{($invoice->btw == 0) ? 'selected': ''}}>0%</option>
                </select>  
        @if($errors->has('btw'))
                <span class="error">
                    {{ $errors->first('btw') }}
                </span>
        @endif
        </div>
        <div class="col-sm-2">Betaalstatus</div>
        <div class="col-sm-10">
                <select id="betaald" name="betaald" class="form-control">
                        <option disabled selected>-- KIES BETAALSTATUS --</option>
                        <option value="0" {{($invoice->betaald == 0) ? 'selected': ''}}>niet betaald</option>
                        <option value="1" {{($invoice->betaald == 1) ? 'selected': ''}}>betaald</option>
                </select>               
                
                @if($errors->has('betaald'))
                <span class="error">
                    {{ $errors->first('betaald') }}
                </span>
                @endif
        </div>

    </div>
</div>




