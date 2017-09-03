@extends('layout')

@section('title', '編集')

@section('content')

{{Form::open(['url' => 'novel/register', 'method'=>'post'])}}

    <div class="form-group">
        <div class="input-field">
            {{Form::label('Title', 'タイトル', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::text('Title',
            isset($results) ? $results -> Title : null,
            ['class' => 'form-control validate counter', 'data-length' => '100','required' => 'required', 'aria-required' => 'true'])}}
            @foreach($errors->get('Title') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>

        <div class="input-field">
            {{Form::label('Series', 'シリーズ', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::text('Series', isset($results) ? $results -> Series : null, ['class' => 'form-control validate counter', 'data-length' => '100','required' => 'required', 'aria-required' => 'true'])}}
            @foreach($errors->get('Series') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>

        <div class="input-field">
            {{Form::label('No', '巻数', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::number('No', isset($results) ? $results -> No : null, ['class' => 'form-control validate', 'min' => '0', 'max' => '999',  'required' => 'required', 'aria-required' => 'true'])}}
            @foreach($errors->get('No') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>

        <div class="input-field">
            {{Form::select('Writer', $creators, isset($results) ? $results -> Writer : null, ['multiple' => true, 'class' => 'form-control'])}}
            {{Form::label('Writer', '作者')}}
        </div>

        <div class="input-field">
            {{Form::select('Painter', $creators, isset($results) ? $results -> Painter : null, ['multiple' => true, 'class' => 'form-control'])}}
            {{Form::label('Painter', '原画')}}
        </div>

        <div class="input-field">
            {{Form::label('Picture', '画像URL or ASIN', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::text('Picture', isset($results) ? $results -> Picture : null, ['class' => 'form-control validate counter', 'data-length' => '100','required' => 'required', 'aria-required' => 'true'])}}
            @foreach($errors->get('Picture') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>

        <div class="input-field">
            {{Form::label('ReleaseDate', '発売日', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::date('ReleaseDate', isset($results) ? $results -> ReleaseDate : null, ['class' => 'form-control validate datepicker', 'required' => 'required', 'aria-required' => 'true'])}}
            @foreach($errors->get('ReleaseDate') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>

        <div class="input-field">
            {{Form::label('Story', 'あらすじ', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
            {{Form::textarea('Story', isset($results) ? $results -> Story : null, ['class' => 'form-control validate materialize-textarea counter', 'data-length' => '10000', 'required' => 'required', 'aria-required' => 'true', 'id' => 'outline'])}}
            @foreach($errors->get('Story') as $message)
                <p class="red-text text-accent-3">{{ $message }}</p>
            @endforeach
        </div>
    </div>

    {{Form::hidden('Id', isset($results) ? $results -> Id : 0)}}

    <br/>

    {{Form::submit('Submit',['class' => 'btn btn-primary form-control'])}}

{{Form::close()}}

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.counter').characterCounter();

        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 20 // Creates a dropdown of 15 years to control year
        });

        $('select').material_select();

    });

    jQuery.extend( jQuery.fn.pickadate.defaults, {
        monthsFull: [ '1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月' ],
        monthsShort: [ '1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月' ],
        weekdaysFull: [ '日曜' , '月曜', '火曜', '水曜', '木曜', '金曜', '土曜'],
        weekdaysShort: [ '日曜' ,  '月曜', '火曜', '水曜', '木曜', '金曜', '土曜'],
        format:'yyyy-mm-dd'
    });
</script>
@endsection