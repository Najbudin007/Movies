

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Movies</h2>
            <h3>Check our <span> Movies </span></h3>
          </div>
  
          <div class="row">
            @foreach ($movies as $movie)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="poster"> <img src="{{asset('images/'. $movie->poster)}}" class="poster_img" alt=""> </div>
                <h4><a href="" class="mt-1">{{ $movie->title }} </a></h4>
                <p>  {!! Str::limit( Str::substr($movie->description,10),200,) !!}</p>
                <button class="btn btn-sm btn-outline-dark mt-1" id="movie{{$movie->id}}" onclick="add_fav('{{$movie->id}}','{{auth()->user()->id ?? null }}')">Add to favourite</button>
              </div>
            </div>
            @endforeach
            
  
          </div>
  
        </div>
      </section>

      <script>
        function add_fav(mid,uid){
          console.log(mid,uid);
          var datas = [mid,uid];
          if(!uid){
            swal({
                        // title: mid,
                        text: "Loin required to add favourite movies",
                        icon: "error",
                        button: "Ok"
                    });
          }else{
            jQuery.ajax({
              url: "add-to-favorite",
              type: "POST",
              data:{
                data: datas,
                "_token": "{{csrf_token()}}"
              },
              success: function(result) {
                console.log(result);
                swal({
                        // title: mid,
                        text: result,
                        icon: "success",
                        button: "Ok"
                    });
                $("#movie"+mid).html("Added to favourite");
            $("#favi").load(" #favi");


            }
            })
          }
        
        }

      </script>