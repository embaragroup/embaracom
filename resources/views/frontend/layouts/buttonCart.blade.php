<style>
    #button-cart {
        vertical-align:right;
        transform:rotate(7deg);
        -ms-transform:rotate(270deg); /* IE 9 */
        -moz-transform:rotate(270deg); /* Firefox */
        -webkit-transform:rotate(270deg); /* Safari and Chrome */
        -o-transform:rotate(270deg); /* Opera */
        position: fixed;
        bottom: 300px;
        right: -35px;
    }
</style>

<a href="{{ url('cart') }}" id="button-cart" class="btn btn-primary" >
    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
    <span class="badge badge-pill badge-danger">
        {{ count((array) session('cart')) }}
    </span>
</a>
