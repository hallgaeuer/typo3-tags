CREATE TABLE tx_tags_domain_model_tag (
    KEY name (name)
);

CREATE TABLE tx_tags_domain_model_tag_mm (
    uid_local INT(11) UNSIGNED DEFAULT 0 NOT NULL,
    uid_foreign INT(11) UNSIGNED DEFAULT 0 NOT NULL,
    type VARCHAR(128) DEFAULT '' NOT NULL,

    KEY relation_foreign (type, uid_foreign),
    KEY relation_local (type, uid_local),

    PRIMARY KEY (uid_local, uid_foreign, type)
);