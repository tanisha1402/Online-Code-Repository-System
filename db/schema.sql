
-- =======================
-- Users Table
-- Stores basic user info
-- =======================
 CREATE TABLE Users (
    user_id INT PRIMARY KEY,
    username VARCHAR2(50) NOT NULL,
    email VARCHAR2(100) UNIQUE NOT NULL,
    password VARCHAR2(100) NOT NULL,
    created_at DATE
 );

-- =======================
-- Repository Table
-- Stores project repositories
-- =======================
CREATE TABLE Repository (
    repo_id INT PRIMARY KEY,
    name VARCHAR2(100) NOT NULL,
    description VARCHAR2(255),
    created_at DATE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
 );

-- =======================
-- CodeVersion Table
-- Tracks versions of code in repositories
-- =======================
 CREATE TABLE CodeVersion (
    version_id INT PRIMARY KEY,
    version_name VARCHAR2(50) NOT NULL,
    commit_message VARCHAR2(255),
    uploaded_at DATE,
    repo_id INT,
    FOREIGN KEY (repo_id) REFERENCES
 Repository(repo_id)
 );

-- =======================
-- Collaborator Table
-- Tracks collaborators added to repositories
-- =======================
  CREATE TABLE Collaborator (
    repo_id INT,
    collaborator_id INT,
    added_on DATE,
    PRIMARY KEY (repo_id, collaborator_id),
    FOREIGN KEY (repo_id) REFERENCES
 Repository(repo_id),
    FOREIGN KEY (collaborator_id) REFERENCES
 Users(user_id)
 );

-- =======================
-- DownloadHistory Table
-- Logs when a user downloads a version
-- =======================
 CREATE TABLE DownloadHistory (
    user_id INT,
    version_id INT,
    downloaded_at TIMESTAMP,
    PRIMARY KEY (user_id, version_id, downloaded_at),
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (version_id) REFERENCES
 CodeVersion(version_id)
 );