#!/usr/bin/env bash

# Script compatible Linux/macOS pour exécuter template-sync
# Utilise curl pour télécharger et sh pour exécuter le script distant

set -e

REPO_URL="https://github.com/api-platform/api-platform"
SYNC_SCRIPT_URL="https://raw.githubusercontent.com/coopTilleuls/template-sync/main/template-sync.sh"

echo "Téléchargement et exécution de template-sync depuis $SYNC_SCRIPT_URL"
echo "Cible : $REPO_URL"

# Télécharger et exécuter
curl -sSL "$SYNC_SCRIPT_URL" | sh -s -- "$REPO_URL"

