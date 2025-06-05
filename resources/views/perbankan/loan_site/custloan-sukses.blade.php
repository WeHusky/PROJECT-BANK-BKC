@section('content')
@include('layouts.navbar')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Loan Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <style>
.loader {
  display: inline-flex;
  border: 2px solid #000;
  --c: no-repeat linear-gradient(#000 0 0) 50%;
  background: var(--c) calc(50% - 5px)/5px 5px,
    var(--c) calc(50% + 5px)/5px 5px;
}

.loader::before,
.loader::after {
  content: "10 09 08 07 06 05 04 03 02 01 00 00";
  font-size: 30px;
  font-family: monospace;
  font-weight: bold;
  line-height: 1em;
  height: 1em;
  width: 2ch;
  color: #0000;
  text-shadow: 0 0 0 #000;
  overflow: hidden;
  margin: 5px 10px;
  animation: l3 10s steps(20) infinite;
}

.loader::before {
  animation-duration: 10s;
}

@keyframes l3 {
  100% {
    text-shadow: 0 -20em 0 #000
  }
}
  </style>
</head>
<body class="bg-[#EFF1F5] max-w-[400px] min-h-screen flex items-center justify-center">

  <!-- Loading Screen -->
  <div id="loading" class="fade-transition flex flex-col items-center justify-center text-center">
  <!-- From Uiverse.io by doniaskima -->
  <div class="loader"></div>
<br>
    <p class="text-gray-700 font-medium">Sending your loan request...</p>
  </div>

  <!-- Success Screen -->
  <div id="success" class="fade-transition opacity-0 pointer-events-none absolute flex-col items-center justify-center text-center bg-[#EFF1F5]  max-w-sm">
    <div class="w-24 h-24 flex items-center justify-center rounded-full bg-green-100 mb-6">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-green-600" viewBox="0 0 24 24" fill="currentColor">
        <path d="M20.39 19.37L5.64 4.61c-.41-.41-1.07-.41-1.48 0-.41.41-.41 1.07 0 1.48l14.75 14.75c.41.41 1.07.41 1.48 0 .41-.41.41-1.07 0-1.48zM13 3h-2v2h2V3zm7 7h-2v2h2v-2zM4 10H2v2h2v-2zm1.71 7.29l1.42 1.42 1.42-1.42-1.42-1.42-1.42 1.42zm12.73-.18l-1.42 1.42 1.42 1.42 1.42-1.42-1.42-1.42z"/>
      </svg>
    </div>
    <h2 class="text-indigo-700 font-semibold text-lg mb-2">
      Your loan request is complete
    </h2>
    <p class="text-gray-600 text-sm">
      Please wait for further information, we will notify you.
    </p>
  </div>

  <script>
    setTimeout(() => {
      const loading = document.getElementById("loading");
      const success = document.getElementById("success");

      loading.classList.add("opacity-0");
      loading.classList.add("pointer-events-none");

      success.classList.remove("opacity-0", "pointer-events-none");
      success.classList.add("flex");
    }, 6000);
  </script>
</body>
</html>
