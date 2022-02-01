FROM nginx:1.21
RUN set -eux; \
	apt-get update; \
	apt-get install -y --no-install-recommends \
		netcat \
	;

COPY ./wait-for-it.sh /usr/bin/wait-for-it

HEALTHCHECK --interval=10s --timeout=5s --start-period=5m --retries=5 CMD [ "nc", "-z", "127.0.0.1", "80" ]
