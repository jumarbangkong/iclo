import urllib.request, re

def get_url(url):
    try:
        req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'})
        html = urllib.request.urlopen(req).read().decode('utf-8')
        match = re.search(r'property="og:image" content="(.*?)"', html)
        if match:
            print(match.group(1))
        else:
            print("Not found")
    except Exception as e:
        print(f"Error: {e}")

get_url('https://unsplash.com/id/foto/pria-memegang-rangka-baja-abu-abu-9Q_pLLP_jmA')
get_url('https://unsplash.com/id/foto/tangan-memegang-formulir-pajak-dengan-kalkulator-dan-laptop-8XrYtOYQDRU')
