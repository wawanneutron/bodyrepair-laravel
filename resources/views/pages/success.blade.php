<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('includes.style')
    <title>Booking - Body Repair</title>
  </head>
  <body>
    <!-- succses checkout -->
    <section class="section-succes">
      <div class="text-center col-success">
        <img src="/images/success.svg" width="300" alt="" class="mb-2" />
        <h1>Yay! Booking Berhasil</h1>
        <p>
          Silahkan cek status booking
          <br />
          dan cek estimasi perbaikan dimenu dashboard
        </p>
        <div>
          <a href="dashboard-booking.html" class="btn btn-cte-home mt-4"
            >Cek Status Booking</a
          >
        </div>
        <div>
          <a href=" {{url("/")}} " class="btn btn-home-page mt-4 px-5"
            >Home Page</a
          >
        </div>
      </div>
    </section>
    @include('includes.script')
  </body>
</html>
