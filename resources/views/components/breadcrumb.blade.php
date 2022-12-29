<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0" data-key="t-{{ $title }}">{{ $title }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);" data-key="t-{{ $li_1 }}">{{ $li_1 }}</a></li>
                    @if(isset($title))
                    <li class="breadcrumb-item active"  data-key="t-{{ $title }}">{{ $title }}</li>
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
