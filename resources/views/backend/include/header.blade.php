@php
    $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
@endphp
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $webinfo->title }} | Admin Panel</title>
