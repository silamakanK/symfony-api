FROM adminer:latest
USER root
RUN apt-get update && apt-get install -y bash && apt-get clean && rm -rf /var/lib/apt/lists/*
USER adminer