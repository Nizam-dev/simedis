<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    @include("template.css")

    <style>
        .imgicon{
            width : 80px;
        }

        .cardku{
            background-color: #fd79a8 !important;
            background-image: linear-gradient(180deg,#fd79a8 10%,#fd79a8 100%);
        }

        .bgku {
            background : #f8f9fc;
        }

        .text-black {
            color: #000;
        }

    </style>

</head>

<body class="bgku">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5 cardku">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="p-5">
                                <div class="mx-auto imgicon">
                                    <img class="w-100 rounded" src="{{asset('public/image/iconamc.png')}}" alt="">
                                </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Masuk</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <label for="" class="text-black">Kode AMC</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">AMC Banyuwangi</option>
                                                <option value="">AMC Genteng</option>
                                                <option value="">AMC Kesilir</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="text-black">Sebagai</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Admin</option>
                                                <option value="">Dokter</option>
                                                <option value="">Pimpinan</option>
                                            </select>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="" class="text-black">Nama Pengguna</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">Alamat</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">No Telepon</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-black">Password</label>
                                            <input type="password" class="form-control" >
                                        </div>
                                        
                                        <a href="{{url('/')}}" class="btn btn-primary btn-user btn-block">
                                            Daftar
                                        </a>

                                    </form>
                                    <hr>
 
                                    <div class="text-center text-white">
                                    Sudah Punya Akun? <a class="small" href="register.html">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include("template.js")



</body>
</html>