# SSO for massopen.cloud

## Motivation

- Get out of the business of managing passwords.
- Allow users to authenticate with their existing institutional accounts.
- Have a centralized place to manage users and integrate services.

## Overview

We're using Keycloak for single sign-on and identity brokering. For identity
providers we're using CILogon.org and Google.

Keycloak deployed in two VMs using `docker-compose` and Apache is used for TLS
termination. Both VMs are connected in a galera cluster between them, and
upgrades can be done seamlessly by pulling the new container images one at a
time.

## Authentication

### Login Flow

The default Keycloak setup assumes that user identities are going to be
primarily internal, and that linked accounts are optional. Our use case
requires the opposite, with Keycloak only used for identity brokering. User
identities being mostly ephemeral and emails used as identifiers.

For this we use the flow described
[here](https://www.keycloak.org/docs/latest/server_admin/#automatically-link-existing-first-login-flow).

In addition, the user is required to accept the terms of service.

### Theming

We have customized Keycloak by creating a new theme that extends the default
`keycloak` theme and overwriting the necessary files. The container is built
with the new theme included.

We've removed the username and password field from the selection page. By
default Keycloak presents that in addition to the various identity provider
options. This change can be avoided if you only have one identity provider as
the login page can be skipped entirely.

We've updated the terms of service page to include a link to a pdf containing
them.

## Authorization

We're not currently using any of the authorization features of Keycloak. All
permissions are persisted in the various end systems and Keycloak is only for
authentication.

## Integrations
- [OpenStack](docs/integration-openstack.md)
