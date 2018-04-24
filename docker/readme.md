!! MAC OS ONLY !!

1. Install Homebrew

2. Install Unison, FSWatch, and docker-sync

			brew install unison
			brew install fswatch
			sudo gem install docker-sync

3. Open a terminal and CD in <your website directory>/docker and run:

			docker network create tomandco;
			docker build -t riseandshine/tomandco --no-cache . ;
			docker-sync-stack start

4. The containers will be created and the sync will begin

5. Link your "mariadb" container with the "tomandco" network
