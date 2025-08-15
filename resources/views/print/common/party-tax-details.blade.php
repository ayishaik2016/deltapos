@if(app('company')['show_tax_number_on_invoice'] && !empty($model->party->tax_number))
    @if(app('company')['tax_type'] == 'gst')
        @if(isset($isPOSInvoice) && $isPOSInvoice)
            <div>{{ __('tax.gst') }}: {{ $model->party->tax_number }}</div>
        @else
            <b>{{ __('tax.gst_number') }}:</b> {{ $model->party->tax_number }}
        @endif
    @else
        @if(isset($isPOSInvoice) && $isPOSInvoice)
            <div>{{ __('tax.tax') }}: {{ $model->party->tax_number }}</div>
        @else
            <b>{{ __('tax.tax_number') }}:</b> {{ $model->party->tax_number }}
        @endif

    @endif
@endif
