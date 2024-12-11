<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Upload Documents</title>
  <style>
    .image-preview {
      max-height: 150px;
      margin-top: 1rem;
      border-radius: 0.5rem;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
    <h1 class="text-2xl font-semibold text-gray-700 mb-6">Upload Dokumen</h1>

    <form action="{{ route('citizens_img.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Input KTP -->
      <div>
        <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
        <input 
          type="file" 
          name="ktp" 
          id="ktp" 
          accept="image/*" 
          class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-indigo-500 focus:border-indigo-500">
        <img id="previewKTP" class="image-preview hidden">
      </div>

      <!-- Input KK -->
      <div>
        <label for="kk" class="block text-sm font-medium text-gray-700">KK</label>
        <input 
          type="file" 
          name="kk" 
          id="kk" 
          accept="image/*" 
          class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-indigo-500 focus:border-indigo-500">
        <img id="previewKK" class="image-preview hidden">
      </div>

      <!-- Input Akta -->
      <div>
        <label for="akta" class="block text-sm font-medium text-gray-700">Akta</label>
        <input 
          type="file" 
          name="akta" 
          id="akta" 
          accept="image/*" 
          class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-indigo-500 focus:border-indigo-500">
        <img id="previewAkta" class="image-preview hidden">
      </div>

      <!-- Input KIA -->
      <div>
        <label for="kia" class="block text-sm font-medium text-gray-700">KIA</label>
        <input 
          type="file" 
          name="kia" 
          id="kia" 
          accept="image/*" 
          class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:ring-indigo-500 focus:border-indigo-500">
        <img id="previewKIA" class="image-preview hidden">
      </div>

      <!-- Submit Button -->
      <div>
        <button 
          type="submit" 
          class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          Submit
        </button>
      </div>
    </form>
  </div>

  <script>
    // Function to handle image preview
    function previewImage(input, previewId) {
      const file = input.files[0];
      const preview = document.getElementById(previewId);

      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
      } else {
        preview.classList.add('hidden');
        preview.src = '';
      }
    }

    // Event listeners for file inputs
    document.getElementById('ktp').addEventListener('change', function() {
      previewImage(this, 'previewKTP');
    });

    document.getElementById('kk').addEventListener('change', function() {
      previewImage(this, 'previewKK');
    });

    document.getElementById('akta').addEventListener('change', function() {
      previewImage(this, 'previewAkta');
    });

    document.getElementById('kia').addEventListener('change', function() {
      previewImage(this, 'previewKIA');
    });
  </script>
</body>
</html>
