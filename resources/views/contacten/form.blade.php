<div class="container">
        <div class="row">
                <div class="col-sm-2">
                    Naam
                </div>
                <div class="col-sm-10">
                        <input class="form-control" type="text" id="naam" name="naam" value="{{ old('naam', $contact->naam )}}">
                        @if($errors->has('naam'))
                 <span class="error">
                     {{ $errors->first('naam') }}
                 </span>
                 @endif
                </div>
        </div>
                <div class="row">
                        <div class="col-sm-2">
                            Straat
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="straat" name="straat" value="{{ old('straat', $contact->straat )}}">
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-2">
                            <label for="nummer_bus">Nummer/bus</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="nummer_bus" name="nummer_bus" value="{{ old('nummer_bus', $contact->nummer_bus )}}">
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-2">
                                <label for="postcode">Postcode</label>
                        </div>
                        <div class="col-sm-10">
                                
        <input class="form-control" type="text" id="postcode" name="postcode" value="{{ old('postcode', $contact->postcode )}}">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="gemeente">Gemeente</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="gemeente" name="gemeente" value="{{ old('gemeente', $contact->gemeente )}}">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="telefoon">Telefoon</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="telefoon" name="telefoon" value="{{ old('telefoon', $contact->telefoon )}}">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="email" name="email" value="{{ old('email', $contact->email )}}">
                        </div>
                </div>




                <div class="row">
                        <div class="col-sm-2">
                                <label for="btw_nummer">BTW-nummer</label>
                        </div>
                        <div class="col-sm-10">
                                <input class="form-control" type="text" id="btw_nummer" name="btw_nummer" value="{{ old('btw_nummer', $contact->btw_nummer )}}">
               @if($errors->has('btw_nummer'))
        <span class="error">
            {{ $errors->first('btw_nummer') }}
        </span>
        @endif
                        </div>
                </div>
</div>



