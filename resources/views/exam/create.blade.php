@extends('layouts.app') 
@section('content')
    <h1>{{ __('Exam Create') }}</h1>

    @can('建立測驗')
        {{ bs()->openForm('post', '/exam') }}

                {{ bs()->formGroup()
                    ->label('測驗標題', false, 'text-sm-right')
                    ->control( bs()->text('title')->placeholder('請填入測驗名稱'))
                    ->showAsRow() 
                    }}

                {{ bs()->formGroup()
                    ->label('測驗狀態', false, 'text-sm-right')
                    ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])
                    ->selectedOption(1)
                    ->inline())
                    ->showAsRow()
                    }}
                    
                    {{ bs()->hidden('user_id', Auth::id()) }}
                    {{ bs()->submit('儲存') }}
            


        {{ bs()->closeForm() }}
    @else
            @component('bs::alert', ['type' => 'danger'])
            @slot('heading')
            無建立測驗的權限
            @endslot
            @endcomponent
    @endcan    
@endsection