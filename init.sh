#!/bin/bash

case "$1" in
    start)
        docker-compose up -d
        ;;
    stop)
        docker-compose down
        ;;
    restart)
        docker-compose down && docker-compose up -d
        ;;
    logs)
        docker-compose logs -f
        ;;
    init)
        docker-compose down -v --remove-orphans
        docker-compose up -d --build
        ;;
    *)
        echo "Usage: $0 {start|stop|restart|logs|init}"
        exit 1
esac
