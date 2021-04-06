@include('frontend.common.user.header', ['title' => $title ?? ''])
@include('frontend.template.user.sidebar')
@include('frontend.inc.user.'.$page)
@include('frontend.common.user.footer')
