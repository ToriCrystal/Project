<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Complete your purchase</title>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col">
                <div class="form-container">
                    <h2 class="form-title text-center">Payment Details</h2>
                    <form action="{{ route('checkOutProcess') }}" method="post" class="checkout-form">
                        @csrf

                        <div class="input-line">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your name and surname">
                        </div>
                        <div class="input-line">
                            <label for="name">Phone</label>
                            <input type="text" name="phone" id="name" placeholder="09xx-xxx-xxx">
                        </div>
                        <div class="input-line">
                            <label for="name">Address</label>
                            <input type="text" name="address" id="name" placeholder="Address">
                        </div>
                        <input type="hidden" name="total" value="{{ $total }}">


                        <button type="submit" class="btn ">Complete purchase</button>
                    </form>
                </div>
            </div>

            <div class="col">
                <div class="form-container">
                    <h2 class="form-title">Checkout Detail</h2>
                    <p>Total : {{ number_format($total, 0, ',', '.') }} VNĐ</p>
                </div>
            </div>
    </section>


</body>

</html>
