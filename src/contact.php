<?php
include 'include/header.php';

if (!isset($_SESSION['user_id'])) {
  header("Location: connexion.php");
  exit();
}


?>




<div class="min-h-screen bg-gradient-to-r from-blue-300 via-blue-200 to-blue-100 py-16">

  <!-- Formulaire de contact -->
  <div class="px-8 py-10 max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-blue-100 shadow-xl rounded-lg font-sans">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Contactez-nous</h2>
    <form action="contact_process.php" method="POST" class="space-y-6">
      <!-- Nom -->
      <div>
        <label for="name" class="block text-sm font-medium text-blue-700">Nom</label>
        <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-2 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300" placeholder="Votre nom" required>
      </div>
      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-blue-700">Email</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300" placeholder="Votre email" required>
      </div>
      <!-- Sujet -->
      <div>
        <label for="subject" class="block text-sm font-medium text-blue-700">Sujet</label>
        <input type="text" id="subject" name="subject" class="mt-1 block w-full px-4 py-2 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300" placeholder="Sujet de votre message" required>
      </div>
      <!-- Message -->
      <div>
        <label for="message" class="block text-sm font-medium text-blue-700">Message</label>
        <textarea id="message" name="message" rows="5" class="mt-1 block w-full px-4 py-2 border border-blue-200 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-300" placeholder="Votre message..." required></textarea>
      </div>
      <!-- Boutons -->
      <div class="flex justify-center mt-8 gap-4">
        <button type="submit" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
          Envoyer
        </button>
        <a href="index.php" class="text-white bg-gray-600 hover:bg-gray-700 font-medium rounded-lg text-sm px-6 py-3 transition duration-200 shadow-lg">
          Retour à l'accueil
        </a>
      </div>
    </form>
  </div>
</div>

<?php
include 'include/footer.php';
?>