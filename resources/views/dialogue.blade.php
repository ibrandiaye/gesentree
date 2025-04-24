<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dialogue National 2025 – Questionnaire</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: url('/assets/images/logo2.svg') no-repeat center center;
      background-size: 40%;
      opacity: 0.05;
      z-index: -1;
    }
  </style>
</head>
<body class="bg-white text-gray-800 font-sans">
  <div class="max-w-3xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">Questionnaire – Dialogue National sur le Système Politique 2025</h1>

    <!-- Barre de progression -->
    <div class="w-full bg-gray-200 h-2 rounded mb-6 overflow-hidden">
      <div id="progressBar" class="h-full bg-blue-600 transition-all duration-300 ease-in-out" style="width: 0%;"></div>
    </div>

    <form id="multiStepForm" class="space-y-6">
      <!-- Étapes -->
      <div class="step block">
        <h2 class="text-xl font-semibold mb-4">Informations générales</h2>
        <div class="space-y-4">
          <input type="text" name="nom" placeholder="Nom et prénom" class="input w-full border p-2 rounded" />
          <input type="text" name="organisation" placeholder="Organisation / Institution" class="input w-full border p-2 rounded" />
          <input type="text" name="fonction" placeholder="Fonction" class="input w-full border p-2 rounded" />
          <select name="statut" class="select w-full border p-2 rounded">
            <option>Acteur politique (majorité)</option>
            <option>Acteur politique (opposition)</option>
            <option>Administration publique</option>
            <option>Société civile</option>
            <option>Autre</option>
          </select>
          <input type="file" name="document_participant" class="file-input w-full" />
        </div>
      </div>

      <div class="step hidden">
        <h2 class="text-xl font-semibold mb-4">Axe 1 : Démocratie, libertés et droits humains</h2>
        <div class="space-y-4">
          <select name="rationaliser_partis" class="select w-full border p-2 rounded">
            <option>Très nécessaire</option><option>Assez nécessaire</option><option>Peu nécessaire</option><option>Pas nécessaire</option>
          </select>
          <select name="financement_partis" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option><option>Sans avis</option>
          </select>
          <select name="statut_opposition" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option><option>Je ne sais pas</option>
          </select>
        </div>
      </div>

      <div class="step hidden">
        <h2 class="text-xl font-semibold mb-4">Axe 2 : Processus électoral</h2>
        <div class="space-y-4">
          <select name="inscription_auto" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option>
          </select>
          <select name="bulletin_unique" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option><option>À étudier</option>
          </select>
          <select name="modalites_parrainage" class="select w-full border p-2 rounded">
            <option>À maintenir</option><option>À moderniser ou digitaliser</option><option>À supprimer</option>
          </select>
          <select name="vote_detenus" class="select w-full border p-2 rounded">
            <option>Favorable</option><option>Défavorable</option><option>Indifférent</option>
          </select>
          <select name="audit_fichier" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option><option>À discuter</option>
          </select>
        </div>
      </div>

      <div class="step hidden">
        <h2 class="text-xl font-semibold mb-4">Axe 3 : Réformes institutionnelles</h2>
        <div class="space-y-4">
          <select name="ceni" class="select w-full border p-2 rounded">
            <option>Oui</option><option>Non</option>
          </select>
          <select name="justice" class="select w-full border p-2 rounded">
            <option>Satisfaisante</option><option>Peu satisfaisante</option><option>À renforcer</option>
          </select>
          <select name="medias" class="select w-full border p-2 rounded">
            <option>Impartial et constructif</option><option>Parfois biaisé</option><option>Inadapté</option><option>Autre</option>
          </select>
        </div>
      </div>

      <div class="step hidden">
        <h2 class="text-xl font-semibold mb-4">Suggestions</h2>
        <textarea name="suggestions" rows="5" class="textarea w-full border p-2 rounded" placeholder="Vos remarques et propositions..."></textarea>
      </div>

      <!-- Boutons navigation -->
      <div class="flex justify-between mt-6">
        <button type="button" onclick="prevStep()" class="btn border border-blue-700 text-blue-700 px-4 py-2 rounded hover:bg-blue-50">Précédent</button>
        <button type="button" onclick="nextStep()" class="btn bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Suivant</button>
        <button type="submit" id="submitBtn" class="btn bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 hidden">Envoyer</button>
      </div>
    </form>
  </div>

   <script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.step');
    const progressBar = document.getElementById('progressBar');
    const submitBtn = document.getElementById('submitBtn');

    function showStep(index) {
      steps.forEach((step, i) => step.classList.toggle('hidden', i !== index));
      submitBtn.classList.toggle('hidden', index !== steps.length - 1);
      updateProgressBar(index);
    }

    function updateProgressBar(index) {
      const percent = ((index + 1) / steps.length) * 100;
      progressBar.style.width = `${percent}%`;
    }

    function nextStep() {
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
      }
    }

    function prevStep() {
      if (currentStep > 0) {
        currentStep--;
        showStep(currentStep);
      }
    }

    showStep(currentStep);
  </script>
</body>
</html>
