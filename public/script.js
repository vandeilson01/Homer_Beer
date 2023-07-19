
    //add produtcs
    $("form").submit(function (event) {
        var formData = {
          name: $("#name").val(),
          email: $("#email").val(),
          superheroAlias: $("#superheroAlias").val(),
        };
    
        $.ajax({
          type: "POST",
          url: "process.php",
          data: formData,
          dataType: "json",
          encode: true,
        }).done(function (data) {
          console.log(data);

          //data.fetch
        });
    
        event.preventDefault();
      });


    //view edit 

    $(".edit-categori").on('click', function (event) {
        $.ajax({
          type: "POST",
          url: "/categoria/edit",
          data: {
            id: $(this).attr('id'),
            _token: $(this).attr('token'),
          },
          dataType: "json",
          encode: true,
        }).done(function (data) {
          console.log(data);

          //data.fetch
        });
    });

    location.reload();
    //edit produtcs
    $("form").submit(function (event) {
        var formData = {
          name: $("#name").val(),
          email: $("#email").val(),
          superheroAlias: $("#superheroAlias").val(),
        };
    
        $.ajax({
          type: "POST",
          url: "process.php",
          data: formData,
          dataType: "json",
          encode: true,
        }).done(function (data) {
          console.log(data);

          //data.fetch
        });
    
        event.preventDefault();
      }); 



    //del produtcs
    
    $('.delete').on('click', function() {
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
                url: "/especialist/destroy",
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

            location.href='/especialist';

          }
        })
      });

      //categorias
      
      
  