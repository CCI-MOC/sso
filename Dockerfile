FROM jboss/keycloak:16.1.1

ENV PROXY_ADDRESS_FORWARDING true

COPY theme/moc /opt/jboss/keycloak/themes/moc

USER 1001

EXPOSE 8080
EXPOSE 8443

ENTRYPOINT [ "/opt/jboss/tools/docker-entrypoint.sh" ]
CMD ["-b", "0.0.0.0"]
