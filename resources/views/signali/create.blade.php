@extends('signali.layouts.app')

@section('head')   
    @parent
    <link href="{{ asset('assets/assets/datetimerpicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form style="" action="" method="POST">

        {{ csrf_field() }}

        <div class="form-group row">
        <label for="signalfrom" class="col-md-2 control-label">Постъпил от:</label>
        <div class="col-md-10">
            <select class="form-control" id="signalfrom" name="signalfrom">
                <option value="" selected="selected">Избери от къде е постъпил сигнала</option>
                <option value="1" @if (old('signalfrom') == "1") {{ 'selected' }} @endif >тел. 112</option>
                <option value="2" @if (old('signalfrom') == "2") {{ 'selected' }} @endif>тел. 0800 20 800</option>
                <option value="3" @if (old('signalfrom') == "3") {{ 'selected' }} @endif>Платформа НПО</option>
            </select>
        </div>
        
        </div>  

        <div class="form-group row">
            <label for="signaldate" class="col-md-2 control-label" autocomplete="off">Дата на сигнала:</label>
            <div class="col-md-10">
                <input name="signaldate" type="text" class="form-control" id="signaldate" placeholder="Дата на регистриране на сигнала от служителя" value="{{ old('signaldate') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="identnumber" class="col-md-2 control-label">Идент. №:</label>
            <div class="col-md-10">
                <input name="identnumber" type="text" class="form-control" id="identnumber" placeholder="Идентификационен номер от републиканския тел. 112" value="{{ old('identnumber') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="pod_id" class="col-md-2 control-label">Местоположение:</label>
            <div class="col-md-10">
                <select class="form-control" id="pod_id" name="pod_id">
                    @if (is_array(old('pod_id')))
                        @foreach (old('pod_id') as $pod_id)
                            <option value="{{ $pod_id }}" selected="selected">{{ $pod_id }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="name2" class="col-md-2 control-label">Подател:</label>
            <div class="col-md-10">
                <input name="name" type="text" class="form-control" id="name" placeholder="Подател на сигнала" value="{{ old('name') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-2 control-label">Телефон:</label>
            <div class="col-md-10">
                <input name="phone" type="text" class="form-control" id="phone" placeholder="Телефонен номер от който е подаден сигнала" value="{{ old('phone') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="adress" class="col-md-2 control-label">Адрес:</label>
            <div class="col-md-10">
                <input name="adress" type="text" class="form-control" id="adress" placeholder="Адрес на подателя на сигнала" value="{{ old('adress') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="opisanie" class="col-md-2 control-label">Описание:</label>
            <div class="col-md-10">
                <textarea rows="4" name="opisanie" class="form-control" id="opisanie" placeholder="Описание на сигнала">{{ old('opisanie') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="signal_for_what" class="col-md-2 control-label">Вид нарушение:</label>
            <div class="col-md-10">
                <select class="form-control" id="narushenia" name="narushenia">
                    <option value=""selected="selected">Избери какво е нарушението</option>
                    <option value="1" @if (old('narushenia') == "1") {{ 'selected' }} @endif>Незаконна сеч</option>
                    <option value="2" @if (old('narushenia') == "2") {{ 'selected' }} @endif>Транспортиране на материали без марки и билет</option>
                    <option value="3" @if (old('narushenia') == "3") {{ 'selected' }} @endif>Съхраняване на дървесина без марки и билет</option>
                    <option value="4" @if (old('narushenia') == "4") {{ 'selected' }} @endif>Продажба на незаконна дървесина</option>
                    <option value="5" @if (old('narushenia') == "5") {{ 'selected' }} @endif>Нарушение на  ЗЛОД</option>
                    <option value="6" @if (old('narushenia') == "6") {{ 'selected' }} @endif>Нарушение на ЗРА</option>
                    <option value="7" @if (old('narushenia') == "7") {{ 'selected' }} @endif>Пожари</option>
                    <option value="8" @if (old('narushenia') == "8") {{ 'selected' }} @endif>Други</option>                       
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="signal_for" class="col-md-2 control-label">Предадено на:</label>
            <div class="col-md-10"><!--Сигналът е за-->
                <select class="form-control" id="send_to" name="send_to">
                    <option value="" selected="selected">Избери на кого е предадено съобщението</option>
                    <option value="101"  @if (old('send_to') == "101") {{ 'selected' }} @endif>РДГ Берковица</option>
                    <option value="102"  @if (old('send_to') == "102") {{ 'selected' }} @endif>РДГ Благоевград</option>
                    <option value="103"  @if (old('send_to') == "103") {{ 'selected' }} @endif>РДГ Бургас</option>
                    <option value="104"  @if (old('send_to') == "104") {{ 'selected' }} @endif>РДГ Варна</option>
                    <option value="105"  @if (old('send_to') == "105") {{ 'selected' }} @endif>РДГ Велико Търново</option>
                    <option value="106"  @if (old('send_to') == "106") {{ 'selected' }} @endif>РДГ Кърджали</option>
                    <option value="107"  @if (old('send_to') == "107") {{ 'selected' }} @endif>РДГ Кюстендил</option>
                    <option value="108"  @if (old('send_to') == "108") {{ 'selected' }} @endif>РДГ Ловеч</option>
                    <option value="109"  @if (old('send_to') == "109") {{ 'selected' }} @endif>РДГ Пазарджик</option>
                    <option value="110"  @if (old('send_to') == "110") {{ 'selected' }} @endif>РДГ Пловдив</option>
                    <option value="111"  @if (old('send_to') == "111") {{ 'selected' }} @endif>РДГ Русе</option>
                    <option value="112"  @if (old('send_to') == "112") {{ 'selected' }} @endif>РДГ Сливен</option>
                    <option value="113"  @if (old('send_to') == "113") {{ 'selected' }} @endif>РДГ Стара Загора</option>
                    <option value="114"  @if (old('send_to') == "114") {{ 'selected' }} @endif>РДГ Смолян</option>
                    <option value="115"  @if (old('send_to') == "115") {{ 'selected' }} @endif>РДГ София</option>
                    <option value="116"  @if (old('send_to') == "116") {{ 'selected' }} @endif>РДГ Шумен</option>
                    <option value="201"  @if (old('send_to') == "201") {{ 'selected' }} @endif>Северозападно ДП Враца</option>
                    <option value="202"  @if (old('send_to') == "202") {{ 'selected' }} @endif>Северно централно ДП Габрово</option>
                    <option value="203"  @if (old('send_to') == "203") {{ 'selected' }} @endif>Североизточно ДП Шумен</option>
                    <option value="204"  @if (old('send_to') == "204") {{ 'selected' }} @endif>Югозападно ДП Благоевград</option>
                    <option value="205"  @if (old('send_to') == "205") {{ 'selected' }} @endif>Южно централно ДП Смолян</option>
                    <option value="206"  @if (old('send_to') == "206") {{ 'selected' }} @endif>Югоизточно ДП Сливен</option>
                    <option value="8888" @if (old('send_to') == "8888") {{ 'selected' }} @endif>ИАРА</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="send_to_extra" class="col-md-2 control-label">Предадено още на:</label>
            <div class="col-md-10">
                <input  type="radio" name="send_to_extra" id="send_extra" value="0" @if (old('send_to_extra') == "0") {{ 'checked' }} @endif  />На никой
                <input  type="radio" name="send_to_extra" id="send_extra" value="1" @if (old('send_to_extra') == "1") {{ 'checked' }} @endif />Полиция
                <input  type="radio" name="send_to_extra" id="send_extra" value="2" @if (old('send_to_extra') == "2") {{ 'checked' }} @endif  />Пожарна
                <input  type="radio" name="send_to_extra" id="send_extra" value="3" @if (old('send_to_extra') == "3") {{ 'checked' }} @endif />БАБХ
            </div>
        </div>

        <div class="form-group row">
            <label for="deistvie" class="col-md-2 control-label">Предприети действия:</label>
            <div class="col-md-10">
                <textarea rows="2" class="form-control" placeholder="Предприети действия от регистриращия сигнала" name="deistvie" cols="50" id="deistvie">{{ old('deistvie') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="deistvie_date" class="col-md-2 control-label" autocomplete="off">Дата на действието:</label>
            <div class="col-md-10">
                <input name="deistvie_date" type="text" class="form-control" id="deistvie_date" placeholder="Дата на предприетите действия от служителя приел сигнала" value="{{ old('deistvie_date') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="notes" class="col-md-2 control-label">Забележка:</label>
            <div class="col-md-10">
                <textarea rows="4" class="form-control" placeholder="Забележка" name="notes" cols="50" id="notes">{{ old('notes') }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="policia" class="col-md-2 control-label">Сигнала е предаден на полицията след 22 часа</label>
            <div class="col-md-10">
                <input id="policia" class="checkbox1" name="policia" type="checkbox" value="1"  @if (old('policia') == "1") {{ 'checked' }} @endif >
            </div>
        </div>

        <div class="form-group row">
            <label for="policia" class="col-md-2 control-label"></label>
            <div class="col-md-10">
                <input class="btn btn-info" type="submit" value="Регистриране на сигнала">
            </div>
        </div>  
    </form>
@endsection

@section('script')
    @parent
        
        <script src="{{ asset('assets/assets/datetimerpicker/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/assets/datetimerpicker/js/moment-with-locales.min.js') }}"></script>
        <script src="{{ asset('assets/assets/datetimerpicker/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/assets/datetimerpicker/js/bootstrap-datetimepicker.min.js') }}"></script>

        <script src="{{ asset('assets/assets/js/src/select2.full.min.js') }}"></script>

        <script src="{{ asset('assets/my_js/select2.js') }}"></script>

        <script src="{{ asset('assets/my_js/datetimepicker.js') }}"></script>

@endsection