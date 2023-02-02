start:
	docker-compose up -d
stop:
	docker-compose down
stop-remove:
	docker-compose down --remove-orphans
app:
	docker exec -it symfony_shop_app /bin/bash
restart:
	docker-compose -f docker-compose.yml stop
	docker-compose -f docker-compose.yml up -d