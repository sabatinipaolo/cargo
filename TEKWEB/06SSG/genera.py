import os
import glob
import shutil

# Configurazione
# Determina la directory in cui si trova questo script
SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))

# Costruisci i percorsi assoluti
TEMPLATE_FILE = os.path.join(SCRIPT_DIR, "template", "index.html")
OUTPUT_FOLDER = os.path.join(SCRIPT_DIR, "sito")
IMAGE_FOLDER = os.path.join(SCRIPT_DIR, "..", "galleria")  # risale di un livello
IMAGE_EXTENSIONS = ["*.png", "*.jpg", "*.jpeg", "*.gif", "*.webp"]

def main():
    sito_path = os.path.join(SCRIPT_DIR, 'sito')
    if os.path.exists(sito_path):
        shutil.rmtree(sito_path)
        
    # Crea la cartella di output se non esiste
    os.makedirs(OUTPUT_FOLDER, exist_ok=True)

    # Trova tutte le immagini nella cartella galleria
    images = []
    for ext in IMAGE_EXTENSIONS:
        images.extend(glob.glob(os.path.join(IMAGE_FOLDER, ext)))
        print( glob.glob("*"))
    
    if not images:
        print("Nessuna immagine trovata in", IMAGE_FOLDER)
        return

    # Ordina le immagini per nome (così img1, img2, ... vengono in ordine)
    images.sort()
   
    # Leggi il template una volta sola
    with open(TEMPLATE_FILE, "r", encoding="utf-8") as f:
        template_content = f.read()

    # Genera una pagina per ogni immagine
    for i, img_path in enumerate(images):
        page_num = i 
        image_filename = os.path.basename(img_path)
        #image_name = os.path.splitext(image_filename)[0]
        
        # Link alle pagine adiacenti (solo se esistono)
        n= len(images)
        prev_page_num = ( page_num - 1 + n) % n
        next_page_num = ( page_num + 1 + n) % n

       
        # Dati da sostituire
        replacements = {
           
            "{{prev_page_num}}": "" if prev_page_num==0 else str(prev_page_num),
            "{{next_page_num}}": "" if prev_page_num==0 else str(next_page_num),
            "{{image_name}}": image_filename
 
        }

        # Applica le sostituzioni
        page_content = template_content
        for placeholder, value in replacements.items():
            page_content = page_content.replace(placeholder, value)

        # Scrivi il file di output
        if page_num == 0:
            output_file = os.path.join(OUTPUT_FOLDER, f"index.html")
        else:
            output_file = os.path.join(OUTPUT_FOLDER, f"index{page_num}.html")
            
        with open(output_file, "w", encoding="utf-8") as f:
            f.write(page_content)

        print(f"Generato {output_file}")

    print("Fatto!")

if __name__ == "__main__":
    main()