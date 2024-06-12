from fastapi import APIRouter, HTTPException
from sqlalchemy.orm import Session
from app.models.user import User
from app.schemas.user import UserSchema

router = APIRouter()

@router.post("/register")
async def register_user(user: UserSchema, db: Session = Depends()):
    existing_user = db.query(User).filter_by(username=user.username).first()
    if existing_user:
        raise HTTPException(status_code=400, detail="Username already exists")
    new_user = User(username=user.username, password=user.password, profile=user.profile, team_id=user.team_id)
    db.add(new_user)
    db.commit()
    return {"message": "User created successfully"}

@router.get("/users")
async def get_users(db: Session = Depends()):
    users = db.query(User).all()
    return [{"id": user.id, "username": user.username, "profile": user.profile} for user in users]