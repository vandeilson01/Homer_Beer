<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        
        <link rel="icon" href="home.png" type="image/png" sizes="16x16">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles


        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 

    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-[#6B7280]">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-[#000000] shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- <script src="{{url('script.js')}}"></script> -->


    <script>
 

   
    //del produtcs


    $(".edit-product").on('click', function (event) {
        
        $.ajax({
        type: "GET",
        url: "/produto/edit/"+$(this).attr('id'),
        data: {
            // id: $(this).attr('id'),
            _token: '{{csrf_token()}}',
        },
        dataType: "json",
        encode: true,
        }).done(function (data) {
            // $("#edit-product").toggle();
            $("#edit-product .name").text(data.name);
            $("#edit-product #name").val(data.name);
            $("#edit-product #id").val(data.id);

            $.ajax({
                type: "GET",
                url: "/categoria_first/"+data.categoria_id,
                dataType: "json",
                encode: true,
            }).done(function (data) {
                console.log(data);
                $("#edit-product .my_categori").text(data.name);
                $("#edit-product .my_categori").val(data.categoria);
            });

            $("#edit-product #description").val(data.description);
            $("#edit-product #price").val(data.price);
            $("#edit-product #stock").val(data.stock);
            $("#edit-product .my_img").attr('src','produtos/img/'+data.img);
           
        });
    });
    
    $('.del-product').on('click', function() {
        Swal.fire({
          title: 'Deseja Deletar ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'SIM',
          cancelButtonText: 'NÃO',
        }).then((result) => {
          if (result.isConfirmed) {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "/produto/destroy",
                type: "POST",
                data: {
                    Mid: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
            });

            Swal.fire({
              title: 'Deletado com sucesso.',
              icon:'success',
              showConfirmButton: false,
          })


          setTimeout(() => {
            location.reload();
          }, 2000);

          

          }
        })


        
      });

      //categorias


      $(".edit-categori").on('click', function (event) {
 
            $.ajax({
            type: "GET",
            url: "/categoria/edit/"+$(this).attr('id'),
            data: {
                // id: $(this).attr('id'),
                _token: '{{csrf_token()}}',
            },
            dataType: "json",
            encode: true,
            }).done(function (data) {
                // $("#edit-categori").toggle();
                $("#edit-categori .name").text(data.name);
                $("#edit-categori #name").val(data.name);
                $("#edit-categori #id").val(data.id);
                // console.log(data);
                //data.fetch

            });
        });


      $('.del-categori').on('click', function() {
        Swal.fire({
          title: 'Deseja Deletar ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'SIM',
          cancelButtonText: 'NÃO',
        }).then((result) => {
          if (result.isConfirmed) {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "/categoria/destroy",
                type: "POST",
                data: {
                    Mid: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
            });

            Swal.fire({
              title: 'Deletado com sucesso.',
              icon:'success',
              showConfirmButton: false,
          })


          setTimeout(() => {
            location.reload();
          }, 2000);

          

          }
        })


        
      });


      //notificacoes 


      $(".edit-notify").on('click', function (event) {
        
            $.ajax({
            type: "GET",
            url: "/notificacao/edit/"+$(this).attr('id'),
            data: {
                // id: $(this).attr('id'),
                _token: '{{csrf_token()}}',
            },
            dataType: "json",
            encode: true,
            }).done(function (data) {
                 
                $("#edit-notify .name").text(data.name);
                $("#edit-notify #name").val(data.name);
                $("#edit-notify #id").val(data.id);
                $("#edit-notify #mesage").val(data.mesage);
                $("#edit-notify #data").val(data.data);

            });
        });


      $('.del-notify').on('click', function() {
        Swal.fire({
          title: 'Deseja Deletar ?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'SIM',
          cancelButtonText: 'NÃO',
        }).then((result) => {
          if (result.isConfirmed) {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "/notificacao/destroy",
                type: "POST",
                data: {
                    Mid: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
            });

            Swal.fire({
              title: 'Deletado com sucesso.',
              icon:'success',
              showConfirmButton: false,
          })


          setTimeout(() => {
            location.reload();
          }, 2000);

          

          }
        })


        
      });

      //entrega 


      $(".edit-entrega").on('click', function (event) {
        
        $.ajax({
        type: "GET",
        url: "/entrega/edit/"+$(this).attr('id'),
        data: {
            // id: $(this).attr('id'),
            _token: '{{csrf_token()}}',
        },
        dataType: "json",
        encode: true,
        }).done(function (data) {
             
            $("#edit-entrega #id").val(data.id);
            $("#edit-entrega #valor_entrga").val(data.valor_entrga);
            $("#edit-entrega #tempo_entrega").val(tempo_entrega.data);

        });
    });


        

      
       
  
    </script>

</html>
