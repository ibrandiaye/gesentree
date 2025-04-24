<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dialogue National 2025 - Formulaire</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: url('/assets/images/logo2.svg') no-repeat center center fixed;
      background-size: contain;
      background-position: top right;
      background-repeat: no-repeat;
    }
    .step { display: none; }
    .step.active { display: block; }
  </style>
</head>
<body class="bg-white bg-opacity-90 min-h-screen p-4">
  <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    <h1 class="text-2xl font-bold text-center text-blue-900 mb-6">Questionnaire – Dialogue National sur le Système Politique 2025</h1>

    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-6">
      <div id="progressBar" class="bg-blue-600 h-2.5 rounded-full" style="width: 20%;"></div>
    </div>

    <form id="multiStepForm" class="space-y-6">
      <!-- Étape 1 -->
      <div class="step active">
        <h2 class="text-xl font-semibold mb-4">Informations générales</h2>
        <div class="space-y-4">
          <label class="block">
            <span class="block font-medium">Nom et prénom</span>
            <input type="text" name="nom" class="w-full border p-2 rounded" />
          </label>

          <label class="block">
            <span class="block font-medium">Organisation / Institution représentée</span>
            <input type="text" name="organisation" class="w-full border p-2 rounded" />
          </label>

          <label class="block">
            <span class="block font-medium">Fonction</span>
            <input type="text" name="fonction" class="w-full border p-2 rounded" />
          </label>

          <label class="block">
            <span class="block font-medium">Statut</span>
            <select name="statut" class="w-full border p-2 rounded">
              <option>Acteur politique (majorité)</option>
              <option>Acteur politique (opposition)</option>
              <option>Administration publique</option>
              <option>Société civile</option>
              <option>Autre</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">Joindre un document pertinent</span>
            <input type="file" name="document_participant" class="w-full border p-2 rounded" />
          </label>
        </div>
      </div>

      <!-- Étape 2 -->
      <div class="step">
        <h2 class="text-xl font-semibold mb-4">Axe 1 : Démocratie, libertés et droits humains</h2>
        <div class="space-y-4">
          <label class="block">
            <span class="block font-medium">5. Nécessité de rationaliser les partis politiques</span>
            <select name="rationaliser_partis" class="w-full border p-2 rounded">
              <option>Très nécessaire</option>
              <option>Assez nécessaire</option>
              <option>Peu nécessaire</option>
              <option>Pas nécessaire</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">6. Encadrement du financement des partis ?</span>
            <select name="financement_partis" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
              <option>Sans avis</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">7. Statut de l’opposition et de son chef</span>
            <select name="statut_opposition" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
              <option>Je ne sais pas</option>
            </select>
          </label>
        </div>
      </div>

      <!-- Étape 3 -->
      <div class="step">
        <h2 class="text-xl font-semibold mb-4">Axe 2 : Processus électoral</h2>
        <div class="space-y-4">
          <label class="block">
            <span class="block font-medium">8. Inscription automatique via carte CEDEAO</span>
            <select name="inscription_auto" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">9. Bulletin unique</span>
            <select name="bulletin_unique" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
              <option>À étudier</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">10. Organisation du parrainage</span>
            <select name="modalites_parrainage" class="w-full border p-2 rounded">
              <option>À maintenir</option>
              <option>À moderniser ou digitaliser</option>
              <option>À supprimer</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">11. Vote des personnes en détention</span>
            <select name="vote_detenus" class="w-full border p-2 rounded">
              <option>Favorable</option>
              <option>Défavorable</option>
              <option>Indifférent</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">12. Audit du fichier électoral</span>
            <select name="audit_fichier" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
              <option>À discuter</option>
            </select>
          </label>
        </div>
      </div>

      <!-- Étape 4 -->
      <div class="step">
        <h2 class="text-xl font-semibold mb-4">Axe 3 : Réformes institutionnelles</h2>
        <div class="space-y-4">
          <label class="block">
            <span class="block font-medium">13. CENA vs CENI indépendante</span>
            <select name="ceni" class="w-full border p-2 rounded">
              <option>Oui</option>
              <option>Non</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">14. Rôle de la justice</span>
            <select name="justice" class="w-full border p-2 rounded">
              <option>Satisfaisante</option>
              <option>Peu satisfaisante</option>
              <option>À renforcer</option>
            </select>
          </label>

          <label class="block">
            <span class="block font-medium">15. Rôle des médias</span>
            <select name="medias" class="w-full border p-2 rounded">
              <option>Impartial et constructif</option>
              <option>Parfois biaisé</option>
              <option>Inadapté</option>
              <option>Autre</option>
            </select>
          </label>
        </div>
      </div>

      <!-- Étape 5 -->
      <div class="step">
        <h2 class="text-xl font-semibold mb-4">Suggestions</h2>
        <label class="block">
          <span class="block font-medium">16. Autres remarques</span>
          <textarea name="suggestions" rows="4" class="w-full border p-2 rounded"></textarea>
        </label>
      </div>

      <div class="flex justify-between mt-6">
        <button type="button" id="prevBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Précédent</button>
        <button type="button" id="nextBtn" class="px-4 py-2 bg-blue-600 text-white rounded">Suivant</button>
        <button type="submit" id="submitBtn" class="hidden px-4 py-2 bg-green-600 text-white rounded">Envoyer</button>
      </div>
    </form>
  </div>

  <script>
    const steps = document.querySelectorAll(".step");
    const progressBar = document.getElementById("progressBar");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");
    let currentStep = 0;

    function showStep(index) {
      steps.forEach((step, i) => {
        step.classList.toggle("active", i === index);
      });
      progressBar.style.width = `${((index + 1) / steps.length) * 100}%`;
      prevBtn.style.display = index === 0 ? "none" : "inline-block";
      nextBtn.style.display = index === steps.length - 1 ? "none" : "inline-block";
      submitBtn.classList.toggle("hidden", index !== steps.length - 1);
    }

    nextBtn.addEventListener("click", () => {
      if (currentStep < steps.length - 1) currentStep++;
      showStep(currentStep);
    });

    prevBtn.addEventListener("click", () => {
      if (currentStep > 0) currentStep--;
      showStep(currentStep);
    });

    showStep(currentStep);
  </script>
</body>
</html>


